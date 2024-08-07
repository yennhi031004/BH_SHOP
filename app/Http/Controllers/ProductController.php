<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
  
   
    public function index()
    {
        // $pagina=Product::paginate(5);
        $categories = Category::all();
        $products = Product::paginate(6);
        return view('product', compact('products', 'categories'));
    }

    public function getProductByCategory(Request $request, $category_id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $category_id)->paginate(6);
        return view('product', compact('categories', 'products'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('query');
        $products = Product::searchProducts($query, 3); // Sử dụng paginate với số lượng mục trên mỗi trang
        
        return view('search', compact('query', 'products', 'categories'));
    }
    
    
   

}
