<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class UpdateAdminController extends Controller
{
    // public function index()
    // {

    //     return view('admin.updateadmin');
    // }
    
    public function productupdateform($id)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        $product = Product::find($id);
        return view('admin.updateadmin', compact('products', 'categories', 'product'));
    }



    public function productupdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'category_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'img' => 'nullable|file',
            ]
        );

        
        $product = Product::findOrFail($id);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('upload'), $imageName);
            $validatedData['img'] = $imageName;
            $oldImgpath = public_path('upload/' . $product->img);
            if (file_exists($oldImgpath)) {
                unlink($oldImgpath);
            }
        }

        $product->update($validatedData);

        return redirect()->route('productadmin');
    }
}
