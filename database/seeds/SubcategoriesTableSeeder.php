<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subcategoryRecords = [
            ['id'=>1, 'category_id'=>1, 'sub_name'=>'Alien Picnic Basket', 'sub_image'=>'', 'description'=>'', 'url'=>'baskets', 'status'=>1],
            ['id'=>2, 'category_id'=>1, 'sub_name'=>'Laundry Basket', 'sub_image'=>'', 'description'=>'', 'url'=>'baskets', 'status'=>1],
        ];
        Subcategory::insert($subcategoryRecords);
    }
}
