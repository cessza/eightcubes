<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Subcategory;
use Image;

class SubcategoryController extends Controller
{
    //
    public function subcategories(){
        Session::get('page','subcategories');
        $subcategories = Subcategory::with('category')->get();
      //  $subcategories = json_decode(json_encode($subcategories));
      //  echo "<pre>"; print_r($subcategories); die;
        return view('oms_admin.subcategories.subcategories')->with(compact('subcategories'));
    }
    public function updateSubcategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Subcategory::where('id',$data['subcategory_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subcategory_id'=>$data['subcategory_id']]);
        }
    }

    public function addEditSubcategory(Request $request,$id=null){
       // echo "test"; die;
        if($id==""){
            $title ="Add Subcategory";
            //dito mag dadagdag ng subkategorya
            $subcategory = new Subcategory;
            $subcategorydata = array();
            $message = "Subcategory Added Successfully!";
        }else{
            $title ="Edit Subcategory";
            $subcategorydata = Subcategory::where('id',$id)->first();
            $subcategorydata = json_decode(json_encode($subcategorydata),true);
            $subcategory = Subcategory::find($id);
            $message = "Subcategory Updated Successfully!";
            //echo "<pre>"; print_r($subcategorydata); die;
            // dito mag babago ng subkategorya
        }

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            //patunay sa mga kategorya
            $rules = [
                'sub_name' =>'required|regex:/^[\pL\s\-]+$/u',
                'category_id' => 'required',
                'url' => 'required',
                'sub_image' => 'image'
            ];
            $customMessages = [
                'sub_name.required' => 'Subcategory Name is Required',
                'sub_name.regex' => 'Valid Subcategory Name is Requires',
                'category_id.required' => 'Category is Required',
                'url.required' => 'Category URL is Required',
                'sub_image.image' => 'Valid Subcategory Image is Require'
            ];
            $this->validate($request,$rules,$customMessages);
            

             //mag uplod ng imahe
             if($request->hasFile('sub_image')){
                $image_tmp = $request->file('sub_image');
                if($image_tmp->isValid()){
                    //kuha ng ekstensyon ng fayl
                    $extension = $image_tmp->getClientOriginalExtension();
                    //kuha ng bagong imahe
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/subcategory_images/'.$imageName;
                    //uplod ng imahe
                    Image::make($image_tmp)->save($imagePath);
                    //iligtas ang imahe
                    $subcategory->sub_image = $imageName;
                }
            }

            $subcategory->category_id = $data['category_id'];
            $subcategory->sub_name = $data['sub_name'];
            $subcategory->description = $data['description'];
            $subcategory->url = $data['url'];
            $subcategory->status = 1;
            $subcategory->save();


            Session::flash('success_message',$message);
            return redirect('admin/subcategories');
        }

        //kuhain lahat ng kategorya
        $getCategories = Category::get();
        return view('oms_admin.subcategories.add_edit_subcategory')->with(compact('title','getCategories','subcategorydata'));
    }
    public function deleteSubcategoryImage($id){
        //kunin ang imahe
        $subcategoryImage = Subcategory::select('sub_image')->where('id',$id)->first();

        //kunin ang pinagkkunan ng imahe
        $subcategory_image_path = 'images/subcategory_images/';

        //tanggalin ang imahe na nakalagay sa pinagkkunan ng mga imahe
        if(file_exists($subcategory_image_path.$subcategoryImage->sub_image)){
            unlink($subcategory_image_path.$subcategoryImage->sub_image);
        }

        //itanggal ang imahe sa subcategory table
        Subcategory::where('id',$id)->update(['sub_image'=>'']);

        $message = 'Subcategory image has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }

    public function deleteSubcategory($id){
        //itanggal ang sub kategorya
        Subcategory::where('id',$id)->delete();

        $message = 'Subcategory has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }
}

