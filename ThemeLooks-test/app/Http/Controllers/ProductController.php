<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductList(){
        return view("products.product_list");
    }

    public function addProduct(){
        return view("products.add_product");
    }

    public function editProduct(){
        return view("products.edit_product");
    }

    public function deleteProduct(){
       
    }
}
