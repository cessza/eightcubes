<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoriesRecord =[
            ['id' =>1, 'name' => 'Baskets','status' => 1],
            ['id' =>2, 'name' => 'Chairs','status' => 1],
            ['id' =>3, 'name' => 'Crates','status' => 1],
            ['id' =>4, 'name' => 'Dish Organizers','status' => 1],
            ['id' =>5, 'name' => 'Drawers','status' => 1],
            ['id' =>6, 'name' => 'Food Keepers','status' => 1],
            ['id' =>7, 'name' => 'Flower Pots','status' => 1],
            ['id' =>8, 'name' => 'Foldable Beds & Tables','status' => 1],
            ['id' =>9, 'name' => 'Kitchenwares','status' => 1],
            ['id' =>10, 'name' => 'Pitchers','status' => 1],
            ['id' =>11, 'name'=> 'Racks', 'status' => 1],
            ['id' =>12, 'name' => 'Storage Boxes','status' => 1],
            ['id' =>13, 'name' => 'Trashbins','status' => 1],
        ];
        Category::insert($categoriesRecord);
    }
}
