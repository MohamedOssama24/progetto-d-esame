<?php

namespace App\Controllers\admin;

use App\Foundation\FCategory;
use App\Foundation\FProduct;
use App\Foundation\FReview;
use App\Models\Product;
use App\Views\admin\VCategory;
use App\Views\admin\VProduct;

class ProductController
{
    public function productsBestSellers() // la parte della statistiche prodotti che fa vedere i piu venduti e meno venduti in base  a quante volte è stato ordiato
    {
        $fcategory = new FCategory();
        $fproduct = new FProduct();
        $categories = $fcategory->getAll();
        $data = [];
        foreach ($categories as $category) {
            $id = $category->getId();
            $best = $fproduct->getBestSellerOfCategory($id);
            $worst = $fproduct->getWorstSellerOfCategory($id);
            if ($best == false) {
                $worst = $best = "non ci sono prodotti in questa categoria";
            } else {
                $best = $best->getName();
                $worst = $worst->getName();
            }
            $data[$category->getName()] = [$best, $worst];
        }
        $vadmin = new VProduct();
        $vadmin->productsBestSellers($data);
    }


    public function store($id) // il tasto di creare   prodotto dentro la classe category
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        if (!$_FILES["uploadfile"]["error"]==4) {
            if (validate($_POST, [
                "name"=>["minLength:1", "maxLength:20"],
                "description"=>["minLength:1", "maxLength:100"],
                "price"=>["isPositive"]
            ])){
                $FProduct = new FProduct();
                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setImagePath(uploadImage());
                $FProduct->store($product, $id);
                redirect(url('/admin/categories/' . $id . '/products'));
            }else{
                redirect(url('/admin/categories/' . $id . '/products/form'));
            }
        } else {
            redirect(url('/admin/categories/' . $id . '/products/form'));
        }
    }


    public function update($catId, $id) // quando entro dentro edit per fare aggioramento del prodtto
    {
        $FProduct = new FProduct();
        $oldproduct = $FProduct->load($id);
        //superglobal, come parametro ci va passato il NOME dell'input a cui fare riferimento
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $timesOrdered = $oldproduct->getTimesOrdered();
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        $product->setTimesOrdered($timesOrdered);
        if (!$_FILES["uploadfile"]["name"] == "") {
            $product->setImagePath(uploadImage());
        } else {
            $imagePath = $oldproduct->getImagePath();
            $product->setImagePath($imagePath);
        }
        $FProduct->update($id, $product);
        redirect(url("/admin/categories/" . $catId . '/products'));
    }

    public function destroy($catId, $id)
    {
        $FProduct = new FProduct();
        $FProduct->delete($id);
        redirect(url("/admin/categories/" . $catId . '/products'));
    }

    public function showEditProduct($cid, $pid) // fa vedere il bottone edit
    {
        $vadmin = new VCategory();
        $fproduct = new Fproduct();
        $product = $fproduct->load($pid);
        $vadmin->showEditProduct($cid, $pid, $product);
    }

    public function showCreateProduct($categoryId) // fa vedere il bottone aggiungi prodotto
    {
        $vadmin = new VCategory();
        $vadmin->showCreateProduct($categoryId);
    }

    public function productsInCategory($id) // se clicco sul nome della categoria mi fa vedere i prodotti dentro
    {
        $fcategory = new FCategory();
        $category = $fcategory->load($id);
        $products = $fcategory->loadCategoryProducts($id);
        $vadmin = new VCategory();
        $vadmin->productsInCategory($products, $category);
    }

    public function showReviews($catId, $id){
        $freviews=new FReview();
        $reviews=$freviews->loadReviewsOfProduct($id);
        $vproduct=new VProduct();
        $vproduct->showReviews($reviews);
    }

}