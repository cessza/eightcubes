<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Category;
use Illuminate\Contracts\Session\Session as SessionSession;

class CategoryController extends Controller
{
    //
    public function categories(){
        Session::put('page','categories');
        $categories = Category::get();
        return view('oms_admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
    public function addEditCategory(Request $request, $id=null){
        if($id==""){
            $title = "Add Category";
            $category = new Category;
            $message = 'Category Added Successfully!';
        }else{
            $title = "Edit Category";
            $category = Category::find($id);
            $message =  "Category Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();

             //patunay sa mga kategorya
             $rules = [
                'name' =>'required|regex:/^[\pL\s\-]+$/u'
            ];
            $customMessages = [
                'name.required' => 'Category Name is Required',
                'name.regex' => 'Valid Category Name is Requires'
            ];
            $this->validate($request,$rules,$customMessages);

            $category->name = $data['name'];
            //$category->status=1;
            $category->save();

            Session::flash('test',$message);
            return redirect('admin/categories');


        }
        return view('oms_admin.categories.add_edit_category')->with(compact('title','category'));
    }
    public function deleteCategory($id){
        //itanggal ang anak ng produkto
        Category::where('id',$id)->delete();

        $message = 'Category has been Deleted Successfully!';
        Session::flash('success_message',$message);
        return redirect()->back();
    }
}
