<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bannerRecords = [
            ['id'=>1, 'image'=>'font1.png', 'link'=>'', 'title'=>'New Products', 'alt'=>'New Products','status'=>1],
            ['id'=>2, 'image'=>'font2.png', 'link'=>'', 'title'=>'Storage Boxes', 'alt'=>'Storage Boxes','status'=>1],
            ['id'=>3, 'image'=>'font3.png', 'link'=>'', 'title'=>'Genesis', 'alt'=>'Genesis','status'=>1]
        ];
        Banner::insert($bannerRecords);
    }
}
