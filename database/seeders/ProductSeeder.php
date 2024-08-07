<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i <=50; $i++){
            Product::create([
                'name' => $faker->word,
                'img' =>'hinh'.$i.'.webp',// tạo chuỗi hình ảnh có dạng hinh1.jpg
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2,10,1000),
                'quantity'=>$faker->numberBetween(1,100),
                'view'=> $faker->numberBetween(1,100),
                'sold'=>$faker->numberBetween(1,100),
                'brand_id' =>$faker->numberBetween(1,10),
                'category_id'=>$faker->numberBetween(1,10)//chọn ngẫu nhiên một danh mục từ 1 đến 10
            ]);
        }
    }
}
