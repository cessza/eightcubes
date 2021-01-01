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
        $subcategoryDetails = Subcategory::select('id','sub_name','url')->where('url',$url)->first()->toArray();
        //dd($subcategoryDetails); die;
        $subcatIds = array();
        $subcatIds[] = $subcategoryDetails['id'];
        // foreach($subcategoryDetails['products'] as $key => $product){
        //     $subcatIds[] = $product['id'];
        // }
        
    return array('subcatIds'=>$subcatIds,'subcategoryDetails' => $subcategoryDetails);
    }
}
