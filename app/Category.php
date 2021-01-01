<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public static function categories(){
        $getCategories = Category::with('subcategories')->where('status',1)->get();
        $getCategories = json_decode(json_encode($getCategories),true);
        return $getCategories;
    }

    public function subcategories(){
        return $this->hasMany('App\Subcategory','category_id')->where(['status'=>1]);
    }
}
