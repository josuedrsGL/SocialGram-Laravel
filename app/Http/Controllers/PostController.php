<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(User $user){
        // dd(auth()->user()); //helper to authentication
        // dd('this is my wall');
        // dd($user);
        return view('wall', ['user' => $user]);
    }

    public function create(){
        // dd('posting...');
        return view('posts.create');
    }
}
