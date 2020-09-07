<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect; 
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCategory(){

        //Category read
        //$categories=Category::latest()->get();
        // $categories = DB::table('categories')->get();
        

        //page made
        $categories=Category::latest()->paginate(5);
        // $categories = DB::table('categories')->paginate(5);
        //  $categories = DB::table('categories')->join('users','categories.user_id','users.id')
        //  ->select('categories.*','users.name')->paginate(5);

        //Trash
        $trashCategory = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trashCategory'));
    }
    public function AddCategory(Request $request){
        $request->validate([
            'category_name' => 'required|max:255',
            
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category less then 255charters',
            
        ]);

        //Category insert with Query Builder
        // $data = array();
        // $data['category_name'] = $request ->category_name;
        // $data['user_id']= Auth::user()->id;
        // DB::table('categories')->insert($data);

        // Category insert

        Category::insert([
            'category_name'=> $request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=> Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Category Inserted');
        //return response()->json($category);$category =

    // $category = new category;
    // $category->category_name =$request->category_name;
    // $category->user_id = Auth::user()->id;
    // $category->save();

    }

    //Edit
    public function Edit($id){
       // $categories = Category::find($id);
       $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit',compact('categories'));
    }

    //Update
    public function Update(Request $request, $id){
        $request->validate([
            'category_name' => 'required|max:255',
            
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category less then 255charters',
            
        ]);
        // $update = Category::find($id)-> update([
        //     'category_name'=> $request->category_name,
        //     'user_id'=> Auth:: user()->id,
        // ]); 

        //Query Builder Category update
        $data =array();
        $data['category_name'] = $request->category_name;
        $data['user_id']=Auth:: user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category Updated');       
    }

    //Soft Delete
    public function SoftDelete($id){

        //DB::table('categories')->where('id', $id)->delete();
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category deleted'); 
         
         // Category::where('id',$id)->delete(); 
    }

    //Restore
    public function Restore($id){
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore'); 

    }

    //permanently Delete
    public function PerDelete($id){
        $perdelete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category permanently Delete');
    }
} 

