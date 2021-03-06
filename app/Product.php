<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    // protected $table = "products"; 
    // protected $primaryKey = "id";
    // protected $guarded = [];
    // public function subcategory(){
    //     return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    // }
    public function subcategory(){
        return $this->belongsTo('App\Subcategory','subcategory_id');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function attributes(){
        return $this->hasMany('App\ProductsAttribute');
    }
    public function images(){
        return $this->hasMany('App\productsImage');
    }
}
