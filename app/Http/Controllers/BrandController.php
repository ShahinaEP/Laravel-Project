<?php

namespace App\Http\Controllers;
use App\Brand;
use Image;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand(){
        //$brands = Brand::latest()->paginate(5);
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    // Store Brand
    public function StoreBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|min:4',
            //'brand_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            //'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand longer then 4 charters',

        ]);
        $brand_image = $request ->file('brand_image');

        //image location set
        // $name_gen=hexdec(uniqid());
        // $img_ext=strtolower($brand_image -> getClientoriginalExtension());
        // $img_name=$name_gen.'.'.$img_ext;
        // $up_location = 'image/brandimage/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

            //Another wey for image location set
        $name_gen=hexdec(uniqid()).'.'.$brand_image -> getClientoriginalExtension();
        Image::make($brand_image)->resize(200,200)->save('image/brandimage/'.$name_gen);
        $last_img ='image/brandimage/'.$name_gen;
        //image & name insert

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Brand Inserted');
    }

    //Edit
    public function Edit($id){
        $brands = Brand::find($id);
        // $brands = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit',compact('brands'));
    }

    //Update Brand
    public function Update(Request $request,$id){
        $request->validate([
            'brand_name' => 'required|min:4',
            //'brand_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
           // 'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.min' => 'Brand longer then 4 charters',

        ]);
        $old_img = $request->old_image;
        $brand_image = $request ->file('brand_image');
        if($brand_image)
        {
            //image location set
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($brand_image -> getClientoriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location = 'image/brandimage/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            //image & name update
            unlink($old_img);
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img,
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('all.brand')->with('success','Brand Updated');
        }else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('all.brand')->with('success','Brand Updated');
        }

    }

    //Delete
    public function Delete($id){
        //img delete from db
        $img = Brand::find($id);
        $old_img = $img ->brand_image;
        unlink($old_img);
        $delete = Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand deleted');
    }

}
