<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function UserView(){
        // dd('Welcom TMC School');
        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);
    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name'  => 'required',
        ]);

         $data = new User();
         $data->usertype = $request->usertype;
         $data->name     = $request->name;
         $data->email    = $request->email;
         $data->password = bcrypt($request->password);
         $data->save();

         $notification = array(
            'message' => "User Inserted Successfully",
            'alert-type' => 'success'
         );
         return redirect()->route('user.view')->with($notification);

    }
}
