<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view("front.index",[
            "product" => $products,
            "category" => $categories,
        ]);
    }
}
