create database if not exists tasteit;
use tasteit;

create table carts(
    id bigint primary key auto_increment
);

create table favourites(
    id bigint primary key auto_increment
);

create table orderStates(
    state varchar(30) primary key default 'Pending'
);


create table paymentMethods(
                               id bigint primary key auto_increment,
                               method varchar(30) not null
);

create table customers(
                          id bigint primary key auto_increment not null,
                          name varchar(20) not null,
                          surname varchar(20) not null,
                          email varchar(40) not null unique,
                          password varchar(1000) not null,
                          favId bigint not null,
                          cartId bigint not null,
                          imagePath varchar(1024) DEFAULT NULL,
                          FOREIGN KEY (favId) references favourites(id),
                          FOREIGN KEY (cartId) references carts(id)
);

create table shippingAddresses(
                                  id bigint primary key auto_increment,
                                  cap int not null,
                                  city varchar(20) not null,
                                  street varchar(20) not null,
                                  homeNumber int not null,
                                  customerId bigint,
                                  FOREIGN KEY (customerId) references customers(id)
);


create table restaurant(
                           id int primary key auto_increment,
                           name varchar(20) not null,
                           email varchar(40) not null,
                           password varchar(1000) not null,
                           addressId bigint not null,
                           phone varchar(11) not null,
                           foreign key(addressId) references shippingAddresses(id)
);

create table categories(
                           id bigint primary key auto_increment,
                           restaurantId int NOT NULL,
                           categoryName varchar(30) NOT NULL,
                           imagePath varchar(1024) DEFAULT NULL,
                           foreign key(restaurantId) references restaurant(id) on delete cascade
);

create table products(
                         id bigint primary key auto_increment not null,
                         name varchar(20) not null,
                         description varchar(100) default null,
                         price float not null,
                         categoryId bigint not null,
                         imagePath varchar(1024),
                         timesOrdered bigint DEFAULT 0,
                         foreign key(categoryId) references categories(id)
);

create table coupons(
                        id varchar(20) primary key,
                        priceCut int not null,
                        expirationDate Date not null,
                        customerId bigint,
                        isUsed tinyint(1) default 0,
                        foreign key(customerId) references customers(id)
);


create table reviews(
                        id bigint primary key auto_increment,
                        stars int default null,
                        comment varchar(100) not null,
                        customerId bigint not null,
                        productId bigint not null,
                        foreign key(customerId) references customers(id),
                        foreign key(productId) references products(id)
);

create table customers_paymentMethods(
                                         id bigint primary key auto_increment,
                                         customerId bigint not null,
                                         cardNumber int(16),
                                         expirationDate Date,
                                         cvv int not null,
                                         cardHolder varchar(40),
                                         foreign key(customerId) references customers(id)
);

create table orders(
                       id bigint primary key auto_increment,
                       creationDate date not null,
                       total float not null,
                       arrivalTime time default null,
                       couponId varchar(20),
                       customerId bigint,
                       paymentId bigint,
                       orderState varchar(30),
                       addressId bigint,
                       cardId bigint default null,
                       foreign key(customerId) references customers(id),
                       foreign key(paymentId) references paymentMethods(id),
                       foreign key(couponId) references coupons(id),
                       foreign key(orderState) references orderStates(state),
                       foreign key(addressId) references shippingAddresses(id),
                       foreign key(cardId) references customers_paymentMethods(id)
);


create table products_carts(
                               id bigint auto_increment primary key,
                               productId bigint,
                               cartId bigint default null,
                               quantity int default 0,
                               foreign key(productId) references products(id),
                               foreign key(cartId) references carts(id)
);

create table orders_products(
                                id bigint primary key auto_increment,
                                orderId bigint,
                                quantity int default 1,
                                name varchar(20) not null,
                                description varchar(100) default null,
                                price float not null,
                                imagePath varchar(1024),
                                productId bigint not null,
                                foreign key(orderId) references orders(id)
);

create table products_favourites(
                                    id bigint primary key auto_increment,
                                    favId bigint,
                                    productId bigint,
                                    foreign key(favId) references favourites(id),
                                    foreign key(productId) references products(id)
);

INSERT INTO `carts`() VALUES ();
INSERT INTO `carts`() VALUES ();
INSERT INTO `carts`() VALUES ();
INSERT INTO `carts`() VALUES ();
INSERT INTO `carts`() VALUES ();
INSERT INTO `carts`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `favourites`() VALUES ();
INSERT INTO `paymentMethods`(`method`) VALUES ('cash');
INSERT INTO `paymentMethods`(`method`) VALUES ('credit card');
INSERT INTO `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Mario','Rossi','mrossi@gmail.com','$2y$10$TXeIAq0qe1Y64.IZ1Mcxqued1I0pliDMZShtsMk3kwoW46Oscui8u',1,1, '/src/assets/images/person_1.jpg');
INSERT INTO `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Sandro','Rosa','sandro@gmail.com','$2y$10$14/Tfqh4PA3NOKUVRtppf.DbkI1MQqr1seHiNLYZZ1CRLJ8ZT/VqW',2,2, '/src/assets/images/sandro.jpg');
INSERT INTO `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Michela','Bianchi','mic@gmail.com','$2y$10$NnS.6A9FCprxEYcHXUxZIOAUAK/cQYm894UMj6FpFWu8A6Jm/6N1e',3,3, '/src/assets/images/Michela.jpg');
insert into `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Alice','Barbieri','alice.barbieri@gmail.com','$2y$10$V/ftzhOF/kRv9sTGMxFxg.iG.tD5lnrQlAwtEGkALBU31lYXcGioi',4,4, '/src/assets/images/poses-para-selfie-12.jpg');
insert into `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Andrea','Martini','andreamartini89@gmail.com','$2y$10$eCrddjc9.1LBoNxhqLW6k.4vg0cztSYTr0PQR5QF5f222ESG4ADdi',5,5, '/src/assets/images/selfie-google-e1554862824540.jpg');
insert into `customers`(`name`, `surname`, `email`, `password`, `favId`, `cartId`, `imagePath`) VALUES ('Franco','Battaglia','fbattaglia@gmail.com','$2y$10$kzvQE2eB4GCawOWqQ.GaFeHIVSewUh9k3BGAm5svVnDXsOOLWkmpG',6,6, '/src/assets/images/MCKENZIE.jpg');
INSERT INTO `shippingAddresses`(`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (1234,'Montepulciano','Santa Barbara',2,null);
INSERT INTO `shippingAddresses`(`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (20121,'Milano','Santa Maria',7,2);
INSERT INTO `shippingAddresses`(`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (67100,"L'Aquila",'Santa Cecilia',10,3);
INSERT INTO `shippingAddresses`(`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (67100,"L'Aquila",'Castello',52,4);
INSERT INTO `shippingAddresses`(`cap`, `city`, `street`, `homeNumber`, `customerId`) VALUES (67100,'Coppito','del Corso',8,4);
INSERT INTO `restaurant`(`name`, `email`, `password`, `addressId`, `phone`) VALUES ('Taste It','tasteIt@gmail.com','$2y$10$TXeIAq0qe1Y64.IZ1Mcxqued1I0pliDMZShtsMk3kwoW46Oscui8u',1,3208976543);
insert into coupons (`id`, `priceCut`, `expirationDate`, `customerId`) values ('C614c7de6d8a19', 30, '2021-12-07', 1);
INSERT INTO `coupons`(`id`, `priceCut`, `expirationDate`, `customerId`) VALUES ('C614c7de6d8345', 20,'2021-09-13',1);
INSERT INTO `coupons`(`id`, `priceCut`, `expirationDate`, `customerId`) VALUES ('C614c7de6d8790', 20,'2021-11-13',2);
INSERT INTO `coupons`(`id`, `priceCut`, `expirationDate`, `customerId`) VALUES ('C614c7de6d8r61', 15,'2022-02-09',3);
INSERT INTO `orderStates`(`state`) VALUES ('Pending');
INSERT INTO `orderStates`(`state`) VALUES ('Accepted');
INSERT INTO `orderStates`(`state`) VALUES ('Denied');
INSERT INTO `orderStates`(`state`) VALUES ('Completed');
INSERT INTO `customers_paymentMethods`(`customerId`, `cardNumber`, `expirationDate`, `cvv`, `cardHolder`) VALUES (1,234567127651473,'2027-09-21',324,'Mario Rossi');
INSERT INTO `customers_paymentMethods`(`customerId`, `cardNumber`, `expirationDate`, `cvv`, `cardHolder`) VALUES (2,2349087129065718,'2025-05-14',784,'Sandro Rosa');
INSERT INTO `customers_paymentMethods`(`customerId`, `cardNumber`, `expirationDate`, `cvv`, `cardHolder`) VALUES (3,8769897134789021,'2030-01-04',521,'Michela Bianchi');
INSERT INTO `customers_paymentMethods`(`customerId`, `cardNumber`, `expirationDate`, `cvv`, `cardHolder`) VALUES (5,5322789034561234,'2028-03-14',521,'Andrea Martini');
INSERT INTO `orders`(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`,`orderState`, `addressId`, `cardId`) VALUES ('2021-10-21',12,NULL,'C614c7de6d8a19',1,1,'Completed',1,null);
INSERT INTO `orders`(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES ('2021-08-21',25,NULL,'C614c7de6d8a19',1,1,'Denied',2,null);
INSERT INTO `orders`(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES ('2021-11-21',19.2,'20:00:00','C614c7de6d8345',2,1,'Completed',3,2);
INSERT INTO `categories`(`restaurantId`, `categoryName`, `imagePath`) VALUES (1,'Pasta','/src/assets/images/pasta.jpg');
INSERT INTO `categories`(`restaurantId`, `categoryName`, `imagePath`) VALUES (1,'Pesce','/src/assets/images/pesce.jpg');
INSERT INTO `categories`(`restaurantId`, `categoryName`, `imagePath`) VALUES (1,'Pizza','/src/assets/images/margherita.jpg');
INSERT INTO `categories`(`restaurantId`, `categoryName`, `imagePath`) VALUES (1,'Vino','/src/assets/images/vino.jpg');
INSERT INTO `categories`(`restaurantId`, `categoryName`, `imagePath`) VALUES (1,'Carne','/src/assets/images/carne.jpg');
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Spiedini di pesce','Pesce spada, salmone, seppie, gamberi, peperoni, zucchine, alloro, salvia, rosmarino e pepe nero',8,2,'/src/assets/images/spiedini-di-pesce.jpg', 80);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Pesce spada','Pesce spada cotto al forno con rosmarino accompagnato con patate dolci',12,2,'/src/assets/images/pesceSpada.jpg', 70);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Margherita','Mozzarella fresca e pomodoro',6,3,'/src/assets/images/margherita.jpg', 10);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Capricciosa','Mozzarella fresca, pomodoro, olive, prosciutto cotto/crudo, carciofini',8,3,'/src/assets/images/capricciosa.jpg', 40);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Merlot Panul',' Vino ricco, corposo, dal colore rubino cupo e dai profumi di frutti maturi come la ciliegia nera del 2018',24,4,'/src/assets/images/merlot.jpg', 50);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Montelpulciano',' Vino ricco, corposo, rosso nobile di Montepulciano a base di acini di montepulciano del 2004',25,4,'/src/assets/images/montepulciano.jpg', 100);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Carbonara','Pasta fresca con guanciale, uovo e pecorino',9,1,'/src/assets/images/carbonara.jpg', 150);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Arrabbiata','Pasta fresca con pomodoro, prezzemolo, aglio e peperoncino',8,1,'/src/assets/images/arrabbiata.jpg', 140);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Cacio e pepe','Pasta fresca con pecorino romano stagionatura media e pepe nero',9,1,'/src/assets/images/cacioEpepe.jpg', 180);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Amatriciana','Pasta fresca con pomodoro, pecorino romano stagionatura media e guanciale',9,1,'/src/assets/images/amatriciana.jpg', 150);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Fiorentina',' Lombata di vitellone/scottona',30,5,'/src/assets/images/fiorentina.jpg', 180);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Tagliata di manzo','Tagliata di manzo con rucola e aceto balsamico',30,5,'/src/assets/images/tagliata.jpg', 200);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Filetto di maiale','Filetto di maiale cotto con il vino bianco, avvolto da pancetta affumicata, rosmarino, burro, pistacchi e pepe nero',20,5,'/src/assets/images/filetto.jpg', 210);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Spigola','Spigola al cartoccio, capperi, pomodorini, aglio, prezzemolo, pepe nero',14,2,'/src/assets/images/spigola.jpg', 50);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Boscaiola','Funghi, salsiccia e mozzarella fresca',8,3,'/src/assets/images/boscaiola.jpg', 90);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Diavola','Pomodoro, mozzarella fresca e salame piccante',7,3,'/src/assets/images/diavola.jpg', 100);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Tartufo','Mozzarella fresca, salsiccia e tartufo nero',9,3,'/src/assets/images/tartufo.jpg', 100);
INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES ('Torrevento','Vino dal colore rosso rubino tendente al granato dopo breve invecchiamento, al naso bouquet pieno e fragrante, delicatamente speziato con sentori di frutti di bosco',13,4,'/src/assets/images/torrevento.jpg', 170);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','molto saporito',1,1);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Ottimo aroma',2,6);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('3','non male',2,2);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Ottima qualità, molto saporito',3,2);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('4','Ottima qualità',1,5);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Veramente ottimo, condito bene',1,13);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('4','Molto buona, cotta al punto giusto',2,11);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Molto buona, carne ottima',3,12);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Molto buona, carne ottima',3,12);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Buonissima, pesce molto fresco',2,14);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('4','Molto saporita, qualità della pasta ottima',2,9);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('4','Molto buona, piccante al punt giusto',3,8);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5','Molto buona, guanciale di ottima qualità',3,7);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5',"Molto buona l'accoppiata tartufo e salsiccia",5,17);
INSERT INTO `reviews`(`stars`, `comment`, `customerId`, `productId`) VALUES ('5',"Per veri intenditori",6,18);
INSERT INTO `products_carts`(`productId`, `cartId`, `quantity`) VALUES (1,1,2);
INSERT INTO `products_carts`(`productId`, `cartId`, `quantity`) VALUES (2,2,1);
INSERT INTO `products_favourites`(`favId`, `productId`) VALUES (1,1);
INSERT INTO `products_favourites`(`favId`, `productId`) VALUES (2,2);
INSERT INTO `orders_products`(`orderId`, `quantity`, `name`, `description`, `price`, `imagePath`, `productId`) VALUES (1,2,'Margherita','Mozzarella fresca e pomodoro',6,'/src/assets/images/margherita.jpg', 3);
INSERT INTO `orders_products`(`orderId`, `quantity`, `name`, `description`, `price`, `imagePath`, `productId`) VALUES (2,2,'Boscaiola','Funghi, salsiccia e mozzarella fresca',8,'/src/assets/images/boscaiola.jpg', 15);
INSERT INTO `orders_products`(`orderId`, `quantity`, `name`, `description`, `price`, `imagePath`, `productId`) VALUES (2,1,'Amatriciana','Pasta fresca con pomodoro, pecorino romano stagionatura media e guanciale',9,'/src/assets/images/amatriciana.jpg', 10);
INSERT INTO `orders_products`(`orderId`, `quantity`, `name`, `description`, `price`, `imagePath`, `productId`) VALUES (3,2,'Pesce spada','Pesce spada cotto al forno con rosmarino accompagnato con patate dolci',12,'/src/assets/images/pesceSpada.jpg',2);

ALTER DATABASE tasteIt CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TRIGGER deleteProducts before delete
    ON products
    FOR EACH ROW
    delete from products_carts where productId=old.id;

CREATE TRIGGER deleteProducts2 before delete
    ON products
    FOR EACH ROW
    delete from products_favourites where productId=old.id;

CREATE TRIGGER deleteProducts3 before delete
    ON products
    FOR EACH ROW
    delete from reviews where productId=old.id;

CREATE TRIGGER deleteCategory before delete
    ON categories
    FOR EACH ROW
    delete from products where categoryId=old.id;