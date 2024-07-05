<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        return view('AdminEnd.index');
    }
    public function usershow(){
        $users = User::where('role','!=','admin')->get();
        return view('AdminEnd.pages.users')->with('users',$users);
    }
    public function destroy($id){
        User::where('id', $id)->delete();
        return redirect()->back()->with('success','User data Deleted Successfully');
    }
}
