<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{

    public function manageUser()
    {
        $users = DB::table('users')->paginate(10);
        return view('admin/user/manageUser',['users'=>$users]);
    }
}
