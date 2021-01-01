<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductsAttribute;
use App\Subcategory;
use App\ProductsImage;
use Session;
use Image;

class ProductsController extends Controller
{
    //
    public function products(){
        Session::put('page','products');
        $products = Product::with(['subcategory'=>function($query){
            $query->select('id','sub_name');
        },'category'=>function($query){
            $query->select('id','name');
        }])->get();
        //$products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products); die;
        return view('oms_admin.products.products')->with(compact('products'));
    }
    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    public function deleteProduct($id){
        //itanggal ang produkto
        Product::where('id',$id)->delete();

        $message = 'Product has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }
    public function addEditProduct(Request $request,$id=null){
        if($id==""){
            $title = "Add Product";
            $product = new Product;
            $productdata = array();
            $message = 'Product Added Successfully!';
        }else{
            $title = "Edit Product";
            $productdata = Product::find($id);
            $productdata = json_decode(json_encode($productdata),true);
            //echo "<pre>"; print_r($productdata); die;
            $message = 'Product Updated Successfully!';
            $product = Product::find($id);
        }

        if($request->isMethod('post')){
            $data =$request->all();
            //echo "<pre>"; print_r($data); die;

                //patunay sa mga produkto
                $rules = [
                    'subcategory_id' => 'required',
                    'product_name' =>'required|regex:/^[\pL\s\-]+$/u',
                    'product_code' => 'required|regex:/^[\w-]*$/',
                    'product_price' => 'required|numeric',
                    'product_color' => 'required|regex:/^[\pL\s\-]+$/u'
                ];
                $customMessages = [
                    'subcategory_id.required' => 'Subcategory is Required',
                    'product_name.required' => 'Product Name is Required',
                    'product_name.regex' => 'Valid Product Name is Required',
                    'product_code.required' => 'Product Code is Required',
                    'product_code.regex' => 'Valid Product Code is Required',
                    'product_price.required' => 'Product Price is Required',
                    'product_price.regex' => 'Valid Product Price is Required',
                    'product_color.required' => 'Product Color is Required',
                    'product_color.regex' => 'Valid Product Color is Required',
                ];
                $this->validate($request,$rules,$customMessages);

                //kumuha ng imahe 
                if($request->hasFile('main_image')){
                    $image_tmp = $request->file('main_image');
                    if($image_tmp->isValid()){
                        $image_name = $image_tmp->getClientOriginalName();
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                        $image_path = 'images/product_images/'.$imageName;
                        Image::make($image_tmp)->save($image_path);
                        $product->main_image = $imageName;
                    }
                }

                if(empty($data['is_featured'])){
                    $is_featured = "No";
                }else{
                    $is_featured = "Yes";
                }

                // iligtas ang mga laman na ilalagay
                $subcategoryDetails = Subcategory::find($data['subcategory_id']);
                $product->category_id = $subcategoryDetails['category_id'];
                $product->subcategory_id = $data['subcategory_id'];
                $product->product_name = $data['product_name'];
                $product->product_code = $data['product_code'];
                $product->product_price = $data['product_price'];
                $product->product_bundle = $data['product_bundle'];
                $product->product_packing = $data['product_packing'];
                $product->product_color = $data['product_color'];
                $product->product_weight = $data['product_weight'];
                $product->url = $data['url'];
                $product->description = $data['description'];
                $product->is_featured = $is_featured;
                $product->status = 1;
                $product->save();

                Session::flash('success_message_products', $message);

                return redirect('admin/products');
        }


        //kategorya at subkategorya
        $subcategories = Category::with('subcategories')->get();
        $subcategories = json_decode(json_encode($subcategories),true);
        //echo "<pre>"; print_r($subcategories); die;

        return view('oms_admin.products.add_edit_product')->with(compact('title','subcategories','productdata'));
    }
    public function deleteProductImage($id){
        //kunin ang imahe
        $productImage = Product::select('main_image')->where('id',$id)->first();

        //kunin ang pinagkkunan ng imahe
        $product_image_path = 'images/product_images/';

        //tanggalin ang imahe na nakalagay sa pinagkkunan ng mga imahe
        if(file_exists($product_image_path.$productImage->main_image)){
            unlink($product_image_path.$productImage->main_image);
        }

        //itanggal ang imahe sa product table
        Product::where('id',$id)->update(['main_image'=>'']);

        $message = 'Product image has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }

    //dito ang mga anak ng produkto
    public function addAttributes(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['att_code'] as $key => $value){
                if(!empty($value)){


                    //att code ang andito pinakkita na bawal maulit
                    $attCountCode = ProductsAttribute::where('att_code',$value)->count();
                    if($attCountCode>0){
                        $message = 'Code already exist. Please add different Code!';
                        Session::flash('error_message',$message);
                        return redirect()->back();
                    }

                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->att_code = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->color = $data['color'][$key];
                    $attribute->bundle_price = $data['bundle_price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status=1;
                    $attribute->save();
                }
            }

            $success_message = 'Product Attributes Added Successfully!';
            Session::flash('success_message',$success_message);
            return redirect()->back();
        }


        $productdata = Product::select('id','product_name','product_code','product_color','main_image')->with('attributes')->find($id);
        $productdata = json_decode(json_encode($productdata),true);
        $title = "Product Attribute";
        return view('oms_admin.products.add_attributes')->with(compact('productdata','title'));
    }

    public function editattributes(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach($data['attrId'] as $key => $attr){
                if(!empty($attr)){
                    ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key],'bundle_price'=>$data['bundle_price'][$key],'stock'=>$data['stock'][$key]]);
                }
            }
            $success_message = 'Product Attributes has been updated Successfully!';
            Session::flash('success_message',$success_message);
            return redirect()->back();  
        }
    }
    public function updateAttributeStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }
    public function deleteAttribute($id){
        //itanggal ang anak ng produkto
        Product::where('id',$id)->delete();

        $message = 'Attribute has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }

    //dito ang mga image
    public function addImages(Request $request,$id){
        if($request->isMethod('post')){
            if($request->hasFile('images')){
                $images = $request->file('images');
                //echo "<pre>"; print_r($images); die;
                foreach ($images as $key => $image){
                    $productImage = new ProductsImage;
                    $image_tmp = Image::make($image);
                    //echo $originalName = $image->getClientOriginalName(); die;
                    $extension = $image->getClientOriginalExtension();
                     $imageName = rand(111,999999).time().".".$extension;

                    $image_path = 'images/product_images/'.$imageName;
                    Image::make($image_tmp)->save($image_path);
                    $productImage->image = $imageName;
                    $productImage->product_id = $id;
                    $productImage->status = 1;
                    $productImage->save();
                }
                $message = 'Image has been added Successfully!';
                Session::flash('success_message',$message);
                return redirect()->back();
            }
        }
        $productdata = Product::with('images')->select('id','product_name','product_code','product_color','main_image')->find($id);
        $productdata = json_decode(json_encode($productdata),true);
       // echo "<pre>"; print_r($productdata); die;
       $title = "Product Images";
       return view('oms_admin.products.add_images')->with(compact('title','productdata'));
    }
    public function updateImageStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }
    public function deleteImage($id){
        //kunin ang imahe
        $productImage = ProductsImage::select('image')->where('id',$id)->first();

        //kunin ang pinagkkunan ng imahe
        $image_path = 'images/product_images/';

        //tanggalin ang imahe na nakalagay sa pinagkkunan ng mga imahe
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }

        //itanggal ang imahe sa product_image table
        ProductsImage::where('id',$id)->delete();

        $message = 'Product image has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }
}
