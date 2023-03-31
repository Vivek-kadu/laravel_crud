<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        // echo $user;
        return view("welcome",compact('user'));
    }

    public function insertuser(Request $request)
    {

        $request->validate([
            'name'=>'required|alpha:ascii',
            'email'=>'email',
            'password'=>'required',
            // |min:12|max:15|',
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return redirect::to('/user');
    }

    public function edituser($id)
    {
        $user = User::where('id',$id)->first();
        return view("edit_user",compact('user'));
    }

    public function updateuser(Request $request)
    {
        $request->validate([
            'name'=>'required|alpha:ascii',
            'email'=>'email|unique:users,email,'.$request->id,
            'password'=>'required',
        ]);
        
        $update = User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            
        ]);

        return redirect::to('/user');
    }

    public function deleteuser(Request $request )
    {
        $del = User::where('id',$request->id)->delete();
        return redirect::to('/user');

    }
}
