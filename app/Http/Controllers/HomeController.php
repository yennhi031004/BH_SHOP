<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
     public function index(Request $request)
    {
        $categories = Category::all();
        
        $products = Product::getProduct(9);
        $productsview = Product::view()->get();
        $pagina= Product::paginate(4);  
        return view('home',compact('products','productsview','pagina'));

    }
    

    // public function index()
    // {
        
    //     // latest sắp xếp sp theo thứ tự thời gian  từ mới đến cũ 
    //     // take giới hạn tới 9 sp 
    //     $products = Product::latest()->take(9)->get();
    //         // $products = Product::getAllProducts();
    //         return view('home', compact('products'));
    //     }
    }


