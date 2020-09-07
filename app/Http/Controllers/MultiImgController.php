<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MultiImg;
use Carbon\Carbon;
use DB;
use Image;

class MultiImgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $images =MultiImg::latest()->get();//all();
        return view('admin.multi_img.index',compact('images'));
    }

    //Store Image
    public function StoreImage(Request $request){
        // $request->validate([

        //     //'image' => 'required|mimes',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ],
        // [
        //     'image.required' => 'Please Enter picture',
        //     //'brand_name.min' => 'Brand longer then 4 charters',

        // ]);
        $image = $request ->file('image');
       foreach($image as $multi_img){
                $name_gen=hexdec(uniqid()).'.'.$multi_img -> getClientoriginalExtension();
                Image::make($multi_img)->resize(200,200)->save('image/multiimage/'.$name_gen);
                $last_img ='image/multiimage/'.$name_gen;
                //image & name insert

                MultiImg::insert([
                    //'brand_name'=>$request->brand_name,
                    'image'=>$last_img,
                    'created_at'=>Carbon::now(),
                ]);
            }
        return Redirect()->back()->with('success','Multiple Image Inserted');

    }
}
