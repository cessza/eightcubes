<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productRecords = [
            ['id'=>1, 'subcategory_id'=>1, 'category_id'=>1, 'product_name'=>'Alien Picnic Basket Black', 'product_code'=>'678BLK', 'product_price'=>80, 'product_bundle'=>480, 'product_color'=>'black', 'product_weight'=>150, 'url'=>'baskets', 'main_image'=>'', 'product_packing'=>6, 'description'=>'', 'is_featured'=>'No', 'status'=>1],
            ['id'=>2, 'subcategory_id'=>1, 'category_id'=>1, 'product_name'=>'Alien Picnic Basket Colored', 'product_code'=>'678BC', 'product_price'=>80, 'product_bundle'=>480, 'product_color'=>'blue', 'product_weight'=>150, 'url'=>'baskets',  'main_image'=>'', 'product_packing'=>6, 'description'=>'', 'is_featured'=>'No', 'status'=>1]
        ];
        Product::insert($productRecords);
    }
}
