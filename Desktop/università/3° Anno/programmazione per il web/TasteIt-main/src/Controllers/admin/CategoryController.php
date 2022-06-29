<?php

namespace App\Controllers\admin;

use App\Foundation\FCategory;
use App\Models\Category;
use App\Views\admin\VCategory;

class CategoryController {


    public function categoriesAdmin(){
        $fcategories=new FCategory();
        $categories= $fcategories->getAll();
        $vadmin= new VCategory();
        $vadmin->categoriesAdmin($categories);
    }


    function create(){// creare  una categoria nuova
        $name = $_POST["name"];
        $fcategory = new FCategory();
        $category= new Category();
        if (validate($_POST, [ // il campo del form dove inseriamo le cose
            "name"=>["minLength:1", "maxLength:20"]
        ])){
            if (!$_FILES["uploadfile"]["error"]==4){  // vedere il link che ha mandato antonio
            // https://www.php.net/manual/en/features.file-upload.errors.php
            // ==4 significa No file was uploaded.
            $category->setName($name);
            $category->setImage(uploadImage());
            $fcategory->store($category);
            redirect(url('/admin/categories'));
            }
            else{
                redirect(url('/admin/categories/add'));
            }
        }else{
            redirect(url('/admin/categories/add'));
        }
    }

    public function showAddCategory(){ // quello che fa vedere il buttone aggiungi categoria
        $vadmin= new VCategory();
        $vadmin->showAddCategory();
    }

    public function destroy(){ // per cancellare una categoria del database
        $id=$_POST["id"];
        $FCategory = new FCategory();
        $FCategory->delete($id);
        redirect(url("/admin/categories/"));
    }

}