<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function products(){
        $product= Product::orderBy("id","desc")->get();
        return response()->json(
            [
                "status" => 200,
                "data" => $product
            ]
            );
    }
    public function Category(){
        $Category= Category::orderBy("id","desc")->get();
        return response()->json(
            [
                "status" => 200,
                "data" => $Category
            ]
            );
    }
    public function User(){
        $User= User::orderBy("id","desc")->get();
        return response()->json(
            [
                "status" => 200,
                "data" => $User
            ]
            );
    }
    public function detail($id){
        $detail= Product::findOrfail($id);
        return response()->json(
            [
                "status" => 200,
                "data" => $detail
            ]
            );
    }
}
