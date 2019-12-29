<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = \DB::table('users')->join('role', 'users.id_role','=','role.id_role')
        ->get();
        return view('admin_panel',compact('users'));
    }

    public function changeRole($id_user, Request $request){
//        dd($request);
        $user = Users::where('id_user',$id_user)->first();
        $user->id_role =$request->id_role;
        $user->save();
        return redirect('/admin');
    }
}
