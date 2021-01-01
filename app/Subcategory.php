<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    // protected $table = "subcategories"; 
    // protected $primaryKey = "id";
    // protected $guarded = [];
    // public function products(){
    //     return $this->hasMany(Product::class,'subcategory_id','id','sub_name');
    // }
    public function category(){
        return $this->belongsTo('App\Category','category_id')->select('id','name');
    }
    public static function subcategoryDetails($url){
        $subcategoryDetails = Subcategory::select('id','sub_name','url','status')->where('url',$url)->first()->toArray();
        dd($subcategoryDetails); die;

        
    return array('subcategoryDetails' => $subcategoryDetails);
    }
}
