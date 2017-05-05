<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showusers()
    {
        $users = User::paginate(10);
      
        return view('user', ['users' => $users]);
    }

    public function edituser($id)
    {
        $user = User::find($id);
      
        return view('admin.edituser', ['user' => $user]);
    }

    public function deleteuser($id)
    {
        $users = User::paginate(10);
      
        return view('admin.deleteuser', ['user' => $user]);
    }
}
