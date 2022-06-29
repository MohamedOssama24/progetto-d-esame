<?php


namespace App\Foundation;


use App\Foundation\admin\FCoupon;
use App\Models\Address;
use App\Models\Cash;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductWithQuantity;
use PDO;

class FOrder extends FConnection {

    function __construct()
    {
        parent::__construct();
    }
// mi fa vedere gli  ordini che ha fatto un user
    public function loadUsersOrders($userId){
        $pdo = FConnection::connect();
        $query="SELECT id, creationDate, total, paymentId, orderState FROM orders where customerId=:id order by creationDate DESC;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$userId));
        $order= $stmt->fetchAll();
        $orders=[];
        foreach ($order as $ord){
        $o = new Order();
        $fpay= new FPaymentMethod();
        $o->setId($ord[0]);
        $o->setCreationDate($ord[1]);
        $o->setTotal($ord[2]);
        if ($ord[3]==1){
            $o->setPayment(new Cash);
        }
        else{
            $o->setPayment($fpay->load($ord[3]));
        }
            $o->setState($ord[4]);
        array_push($orders, $o);
        }
        return $orders;
    }


    public function getOrderProducts($id){
        $pdo = FConnection::connect();
        $query = "select name, quantity, price, imagePath, description, productId from orders_products where orderId=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $products = $stmt->fetchAll();
        $prods = [];
        foreach($products as $p){
            //$prod = new Product;
            $prod = new Product();
            $prod->setName($p[0]);
            $prod->setPrice($p[2]);
            $prod->setImagePath($p[3]);
            $prod->setDescription($p[4]);
            $prod->setId($p[5]);
            //$stmt->debugDumpParams();

            array_push($prods,[$prod, $p[1]]);
        }
        return $prods;

    }


    public function getAll(){
        $pdo = FConnection::connect();
        $query= "SELECT id, creationDate, total, orderState FROM orders order by creationDate DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $ords = $stmt->fetchAll();
        //$stmt->debugDumpParams();
        $orders = [];
       //print_r($ords);
        foreach ($ords as $ord) {
            $o = new Order();
            $o->setId($ord[0]);
            $o->setCreationDate($ord[1]);
            $o->setTotal($ord[2]);
            $o->setState($ord[3]);
            array_push($orders, $o);
        }
        //print_r($orders);
        return $orders;
    }


    public function update($order){
        $pdo = FConnection::connect();
        $query='UPDATE `orders` SET `arrivalTime`=:arrivalTime, `orderState`=:state where id=:id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':arrivalTime'=>$order->getArrivalTime(),
            ':state'=>$order->getState(),
            ':id'=>$order->getId()));
        //$stmt->debugDumpParams();
    }

    public function load($id){
        $fcoupon=new FCoupon;
        $fpay=new FPaymentMethod;
        $faddress=new FAddress;
        $pdo = FConnection::connect();
        $query = 'select * from orders where id=:id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
        $o=$stmt->fetch();
        $order=new Order;
        $order->setId($o[0]);
        $order->setCreationDate($o[1]);
        $order->setTotal($o[2]);
        $order->setArrivalTime($o[3]);
        if ($o[4]!=""){
            $order->setCoupon($fcoupon->load($o[4]));
        }
        else{
            $order->setCoupon(NULL);
        }
        $order->setCustomerId($o[5]);
        if ($o[6]==2){
        $order->setPayment($fpay->load($o[9]));
        }
        else{
            $order->setPayment(new Cash);
        }
        $order->setState($o[7]);
        $order->setAddress($faddress->load($o[8]));
        //print_r($o);
        return $order;
    }

    function store($order): string {
        $pdo = FConnection::connect();
        if (get_class($order->getPayment())=="App\Models\CreditCard") {
            if ($order->getCoupon()!=NULL){
            $couponId=$order->getCoupon()->getId();
            $query = 'INSERT INTO orders(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES (NOW(), :total, NULL, :couponId, :customerId, 2, :state , :address, :payment)';
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(':total'=>$order->getTotal(),
                ':couponId'=>$couponId,
                ':customerId'=>$order->getCustomerId(),
                ':state'=>$order->getState(),
                ':address'=>$order->getAddress()->getId(),
                ':payment'=> $order->getPayment()->getId()
                ));
            }
            else {
                $query = 'INSERT INTO orders(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES (NOW(), :total, NULL, NULL, :customerId, 2, :state , :address, :payment)';
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':total'=>$order->getTotal(),
                    ':customerId'=>$order->getCustomerId(),
                    ':state'=>$order->getState(),
                    ':address'=>$order->getAddress()->getId(),
                    ':payment'=> $order->getPayment()->getId()
                ));
            }
        }
        else {
            if ($order->getCoupon()!=NULL){
            $couponId=$order->getCoupon()->getId();
            $query = 'INSERT INTO orders(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES (NOW(), :total, NULL, :couponId, :customerId, 1, :state , :address, NULL)';
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(':total'=>$order->getTotal(),
                ':couponId'=>$couponId,
                ':customerId'=>$order->getCustomerId(),
                ':state'=>$order->getState(),
                ':address'=>$order->getAddress()->getId()
            ));
            } else{
                $query = 'INSERT INTO orders(`creationDate`, `total`, `arrivalTime`, `couponId`, `customerId`, `paymentId`, `orderState`, `addressId`, `cardId`) VALUES (NOW(), :total, NULL, NULL, :customerId, 1, :state , :address, NULL)';
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':total'=>$order->getTotal(),
                    ':customerId'=>$order->getCustomerId(),
                    ':state'=>$order->getState(),
                    ':address'=>$order->getAddress()->getId()
                ));
            }
        }
        return $pdo->lastInsertId();
    }

    function storeOrdersProducts($orderid, $prodWithQuantity){
        $pdo = FConnection::connect();
        foreach ($prodWithQuantity as $product){
            $query='insert into orders_products (`orderId`, `quantity`, `name`, `description`, `price`, `productId`, `imagePath`) VALUES (:orderId, :quantity, :name, :description, :price, :pId, :imagePath)';
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(':orderId'=>$orderid,
                ':quantity'=>$product[1],
                ':name'=>$product[0]->getName(),
                ':description'=>$product[0]->getDescription(),
                ':price'=>$product[0]->getPrice(),
                ':pId'=>$product[0]->getId(),
                ':imagePath'=>$product[0]->getImagePath()
                ));
            $this->changeTimesOrdered($prodWithQuantity);
            //$stmt->debugDumpParams();
        }
    }

    private function changeTimesOrdered($prods){
        $pdo = FConnection::connect();
        foreach($prods as $p){
            $query="update products set timesOrdered = timesOrdered+:quantity where id= :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(':quantity'=>$p[1],
                ':id'=>$p[0]->getId()
            ));
        }
    }

    public function confirmOrder($id){
        $pdo = FConnection::connect();
        $query="update orders set orderState = 'Completed' where id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(':id'=>$id));
    }

}