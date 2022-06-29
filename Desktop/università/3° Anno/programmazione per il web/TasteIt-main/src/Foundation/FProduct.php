<?php


namespace App\Foundation;


use App\Models\Customer;
use App\Models\Product;
use App\Models\Review;
use PDO;

class FProduct extends FConnection {

    function __construct()
    {
        parent::__construct();
    }

    function store($product, $categoryId): string {
        $pdo = FConnection::connect();
        $query = 'INSERT INTO `products`(`name`, `description`, `price`, `categoryId`, `imagePath`, `timesOrdered`) VALUES (:name, :description, :price, :categoryId, :image, 0);';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':name'=>$product->getName(),
            ':description'=> $product->getDescription(),
            ':price'=>  $product->getPrice(),
            ':categoryId' => $categoryId,
            ':image'=>$product->getImagePath()
        ));
        return $pdo->lastInsertId(); //funzione di php che dice :Restituisce l'ID dell'ultima riga o valore della sequenza inserita nel pdo
    }

    function load($productId){
        $pdo = FConnection::connect();
        $query = 'select * from products where id = :productId';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':productId'=>$productId));
        $p=$stmt->fetch();
        $freviews= new FReview(); // ho creato l'oggetto recensione per poterlo usare sotto per lasciare la recensione
        $prod=new Product;
        $prod->setId($p[0]);
        $prod->setName($p[1]);
        $prod->setDescription($p[2]);
        $prod->setPrice($p[3]);
        $prod->setImagePath($p[5]);
        $prod->setTimesOrdered($p[6]);
        $prod->setReviews($freviews->loadReviewsOfProduct($p[0]));// qua usa la funzione di review per caricare recnesioni su un determinato prodotto
        return $prod;
    }


    function getBestSellers(){
        $pdo = FConnection::connect();
        $query="SELECT * FROM products ORDER BY timesOrdered DESC LIMIT 8;"; // lo sceglie in base al numero di ordinazione
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $prods = $stmt->fetchAll();
        $products = [];
        //print_r($prods);
        foreach ($prods as $prod) { // $prod  dell'oggetto creato sopra in  function load dei prodottti che sono stati caricati
            $p = new Product();
            $p->setId($prod[0]);
            $p->setName($prod[1]);
            $p->setDescription($prod[2]);
            $p->setPrice($prod[3]);
            $p->setImagePath($prod[5]);
            $p->setTimesOrdered($prod[6]);
            array_push($products, $p);// treats array as a stack, and pushes the passed variables onto the end of array.
            // quindi tratta $products come un array e mette tutte le cose di $p dentro l'array "$products"
        }
        //print_r($products);
        return $products;
    }

    //يعني كام واحد حظ كام نجمة ويحسب المديا بتعتم ويورني نسبة النجمة

    function getAvgRating($productId){ // la valutazione media delle stella sul prodotto
        $pdo = FConnection::connect();
        $query="SELECT avg(stars) as avgstars FROM reviews where ProductId = :productId;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':productId'=>$productId));
        return $stmt->fetchAll();

    }
// non mi va di pensare a questo , quindi penso dopo
    function getBestRated(){
        $pdo = FConnection::connect();
        $query="select avg(stars) as average, p.id, p.name, p.price, p.imagePath from reviews as r join products as p on p.id = r.productId group by productId order by average desc limit 8";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getRatings($productId){
        $pdo = FConnection::connect();
        //select * from reviews where productId=$productId;
        $query='select * from reviews where productId = :productId';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':productId'=>$productId));
        $reviews = $stmt->fetchAll();
        $rev = [];
        //$stmt->debugDumpParams();
        //print_r($reviews);
        foreach($reviews as $review) {
            $r = new Review();
            $customer = new FCustomer();
            $r->setId($review[0]);
            $r->setStars($review[1]);
            $r->setComment($review[2]);
            $r->setCustomer($customer->load($review[3]));
            array_push($rev, $r);
        }
        return $rev;
    }


    function getBestReviews(){ // mi fa vedere le recnesioni migliori quelli che si muovono in home
        $pdo = FConnection::connect();
        $query="SELECT r.id, r.stars, r.comment, r.customerId, r.productId, p.name, p.imagePath FROM reviews as r join products as p on r.productId = p.id group by p.id ORDER BY stars DESC LIMIT 6;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $reviews = $stmt->fetchAll();
        $rev = [];
        $prod = [];

        foreach($reviews as $review) {
            $r = new Review();
            $p = new Product();
            $customer = new FCustomer();
            $r->setId($review[0]);
            $r->setStars($review[1]);
            $r->setComment($review[2]);
            $r->setCustomer($customer->load($review[3]));
            array_push($rev, $r);
            $p->setId($review[4]);
            $p->setName($review[5]);
            $p->setImagePath($review[6]);
            $p->setReviews($rev);
            array_push($prod, $p);
            $rev = [];
        }
        return $prod;
    }


    function getBestSellerOfCategory($id){// mi fa vedere il prodotto che è stato ordinato di piu , ho messo DESC per dire in modo decrescente
        $pdo = FConnection::connect();
        $query="SELECT * FROM products WHERE categoryId = :id ORDER BY timesOrdered DESC LIMIT 1;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $p=$stmt->fetch();
        if($p!=NULL){
        $prod=new Product;
        $prod->setId($p[0]);
        $prod->setName($p[1]);
        $prod->setDescription($p[2]);
        $prod->setPrice($p[3]);
        $prod->setImagePath($p[5]);
        $prod->setTimesOrdered($p[6]);
        return $prod;
        }
        else{return NULL;}
    }

    function getWorstSellerOfCategory($id){ // mi fa vedere il peggior prodotto in base al numero di ordinazione
        $pdo = FConnection::connect();
        //SELECT name FROM products WHERE categoryId={$id} ORDER BY timesOrdered LIMIT 1;
        $query="SELECT * FROM products WHERE categoryId = :id ORDER BY timesOrdered LIMIT 1;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $p=$stmt->fetch();
        if($p!=NULL){
        $prod=new Product;
        $prod->setId($p[0]);
        $prod->setName($p[1]);
        $prod->setDescription($p[2]);
        $prod->setPrice($p[3]);
        $prod->setImagePath($p[5]);
        $prod->setTimesOrdered($p[6]);
        return $prod;
        }
        else{return NULL;}
    }

    public function getAll() { // mi fa vedere tutti i prodotti che ci sono
        $pdo = FConnection::connect();
        $query = "SELECT * FROM products";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $prods = $stmt->fetchAll();
        //$stmt->debugDumpParams();
        $products = [];
        //print_r($prods);
         foreach ($prods as $prod) {
             $p = new Product();
             $p->setId($prod[0]);
             $p->setName($prod[1]);
             $p->setDescription($prod[2]);
             $p->setPrice($prod[3]);
             $p->setImagePath($prod[5]);
             array_push($products, $p);
         }
         //print_r($orders);
         return $products;
      }
// mi inserisci le cose dentro il carrello
      public function addToCart($productId, $cartId, $quantity) {
          $pdo = FConnection::connect();
          $query = 'insert into products_carts(`productId`, `cartId`, `quantity`) VALUES (:productId, :cartId, :quantity);';
          $stmt = $pdo->prepare($query);
          $stmt->execute(array(
              ':productId'=>$productId,
              ':cartId'=>$cartId,
              ':quantity'=>$quantity
          ));
//          return $stmt->fetch();
      }
// fa update di un prodtto
    function update($id, $product) {
        $pdo = FConnection::connect();
        $query = 'UPDATE products SET name = :name, description = :description, price = :price, imagePath = :image where id = :id;';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            ':name'=>$product->getName(), // ho messo il metodo get cosi mi restituisce i nomi che cerano nel database per poi fare un set a loro
            ':description'=>$product->getDescription(),
            ':price'=>$product->getPrice(),
            ':image'=>$product->getImagePath(),
            ':id'=>$id
        ));
        //$stmt->debugDumpParams();
    }

    function delete($id) {
        $pdo = FConnection::connect();
        $query = "DELETE FROM products where id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
    }


}
