<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductAdminController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name','Desc')->get();
        $products = Product::orderBy('name','asc')->paginate(5);
        return view('admin.productadmin',compact('categories','products'));
    }
    public function productadd(Request $request){
        // $validateData = $request->validate([
        //     'category_id' => 'required|string|max:255',
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric|max:255',
        //     'img' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,svg|max:255',
        // ]);
        
        $validateData = $request->all();
        if($request->hasFile('img')){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'),$imageName);
            $validateData['img']=$imageName;
        }
        $products=Product::create($validateData);

        $categories=Category::orderBy('name','ASC')->get();
        $products=Product::orderBy('id','DESC')->paginate(10);
        return view('admin.productadmin',compact('categories','products'));

     }
    //  public function productdelete($id){
    //     $product = Product::find($id);
    
    //     if ($product) {
    //         $imgpath = public_path('upload') . '/' . $product->img;
    
    //         // Kiểm tra sự tồn tại của file và xóa nó
    //         if (file_exists($imgpath)) {
    //             unlink($imgpath);
    //         }
    
    //         // Xóa bản ghi sản phẩm khỏi cơ sở dữ liệu
    //         $product->delete();
    //     }
    
    //     // Chuyển hướng về trang quản lý sản phẩm
    //     return redirect()->route('productadmin')->with('success', 'Sản phẩm đã được xóa thành công');
    // }
    public function productdelete($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        // Kiểm tra nếu sản phẩm tồn tại
        if ($product) {
            // Xây dựng đường dẫn hình ảnh sử dụng cột 'image'
            $imgPath = public_path("uploaded/{$product->image}");

            // Kiểm tra nếu file tồn tại và xóa nó
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }

            // Xóa sản phẩm khỏi cơ sở dữ liệu
            $product->delete();
        }

        // Điều hướng về trang danh sách sản phẩm
        return redirect()->route('productadmin');
    }
    
}
