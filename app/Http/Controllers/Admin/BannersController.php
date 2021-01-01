<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Image;
use Session;

class BannersController extends Controller
{
    //
    public function banners(){
        Session::put('page','banners');
        $banners = Banner::get()->toArray();
       // dd($banners); die;
       return view('oms_admin.banners.banners')->with(compact('banners'));
    }

    
    public function addeditBanner($id=null,Request $request){
        if($id==""){
            //magdagdag ng baner
            $banner = new Banner;
            $title = "Add Banner Image";
            $message = "Banner Added Successfully!";
        }else{
            //baguhin ang baner
            $banner = Banner::find($id);
            $title = "Edit Banner Image";
            $message = "Banner Updated Successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            //bagong imahe
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    //kunin ang orihinal na pangalan
                    $image_name = $image_tmp->getClientOriginalName();
                    //kunin ang pag dugtong
                    $extension = $image_tmp->getClientOriginalExtension();
                    //maglagay ng bagong imahe
                    $imageName = $image_name.'-'.rand(111,999999).".".$extension;
                    // magtala ng paglalagyan ng imahe
                    $banner_image_path = 'images/banner_images/'.$imageName;
                    //ilagay sa lalagyanan ng imahe
                    Image::make($image_tmp)->save($banner_image_path); 
                    //ilagay sa tableta ng baner
                    $banner->image = $imageName;
                }
            }
            $banner->save();
            Session::flash('success_messages',$message);
            return redirect('admin/banners');
        }
        return view('oms_admin.banners.add_edit_banner')->with(compact('title','banner'));
    }
    //status
    public function updateBannerStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }
    public function deleteBanner($id){
        // kuha baner
        $bannerImage = Banner::where('id',$id)->first();

        //kunin ang imahe sa pinagkunan
        $banner_image_path = 'images/banner_images/';

        //tanggalin ang imahe sa pinagkunan
        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        //tanggalin baner
        Banner::where('id',$id)->delete();

        Session::flash('success_messages','Banner Deleted Successfully!');
        return redirect()->back();
    }
}
