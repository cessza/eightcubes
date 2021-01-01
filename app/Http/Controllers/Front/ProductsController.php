<?php

namespace App\Http\Controllers\Front;

use App\Subcategory;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    //
    public function listing($url){
        $subcategoryCount = Subcategory::where(['url'=>$url, 'status'=>1])->count();
        if($subcategoryCount>0){
            $subcategoryDetails = Subcategory::subcategoryDetails($url);
            $subcategoryProducts = Product::whereIn('subcategory_id',$subcategoryDetails)->where('status',1)->get()->toArray();
            // echo "<pre>"; print_r($subcategoryDetails);
            // echo "<pre>"; print_r($subcategoryProducts); die;
            return view('front.products.listing')->with(compact('subcategoryDetails','subcategoryProducts'));
        }else{
            abort(404);
        }
    }

    // public function showProducts(){
    //     $products = Product::with('subcategory')->get()->simplePagination;
    //     $subcategories = Subcategory::with('products')->get();
    //     //dd($products);
    //     return view('front.products.listing')->with('products',$products,'subcategories',$subcategories);
    // }
}
