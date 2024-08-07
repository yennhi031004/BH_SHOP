<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $productId = $request->id;
        $getDetail = Product::findOrFail($productId);
        $products = Product::getProduct(4);
        return view('detail',compact('getDetail','products'));
    }
    
}
