<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Profile(){
        return view('admin.profile.index');
    }

    // profile update
    public function ProfileUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',


        ],
        [
            'name.required' => 'Please Enter your profile Name',
            'name.max' => 'Category less then 255charters',

        ]);

        $id = Auth::id();
        User::find($id)->update([
            'name'=> $request->name,
            'email'=>$request->email,
        ]);
        return Redirect()->back()->with('success','Profile Updated');

    }
}
