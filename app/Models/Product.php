<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public static function getProduct($limit = 9)
    {
        return self::latest()->limit($limit)->get();
    }
    public static function scopeView($query){
        return $query->where('view','>',10)->orderBy('id','desc')->limit(6);

    }
   // Phương thức lấy sản phẩm giới hạn số lượng
   public static function getProducts($limit)
   {
       return self::limit($limit)->get();
   }

   // Phương thức tìm kiếm sản phẩm theo tên
   public static function searchProducts($query, $perPage = 3)
   {
       return self::where('name', 'LIKE', "%$query%")->paginate($perPage);
   }
    
}
   
    // static function getAllProducts(){
    //     return Product::orderBy('id', 'desc')->get();
    //     public static function getLatestProducts($limit = 9)
    // {
    //     return self::latest()->take($limit)->get();
    // }
    // }
    // public function scopeInStock($query)
    // {
    //     return $query->where('quantity', '>', 0)->get();
    // }

    // public function scopeDiscounted($query, $discount)
    // {
    //     return $query->where('discount', '>=', $discount)->get();
    // }

    // public function scopeNewProducts($query)
    // {
    //     return $query->where('created_at', '>=', now()->subMonth())->get();
    // }


