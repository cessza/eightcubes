<?php

use Illuminate\Database\Seeder;
use App\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productsAttributeRecords = [
            ['id'=>1, 'product_id'=>1, 'size'=> '37 x 24 x 24 cm', 'color'=>'black', 'bundle_price'=>480, 'stock'=>100, 'att_code'=>'678BLK', 'status'=>1]
        ];
        ProductsAttribute::insert($productsAttributeRecords);
    }
}
