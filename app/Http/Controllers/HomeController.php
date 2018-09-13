<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Product $product){
        $_product = $product->paginate(8);
        return view('home',['products'=>$_product]);
    }
}
