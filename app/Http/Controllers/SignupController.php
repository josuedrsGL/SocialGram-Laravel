<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class SignupController extends Controller
{
    //
    public function index() {
        return view('auth.signup');
    }

    public function store(Request $request){
        // dd($request);
        // dd($request->post('email'));

        //to modify the request
        $request->request->add(['username' => Str::slug($request->username)]);

        //validations of forms
        $this->validate($request, [
            'name' => "required|max:30",
            'username' => "required|unique:users|min:3|max:20",
            'email' => "required|unique:users|email|",
            'name' => "required|min:5|max:60",
            'password' => "required|confirmed|min:6"
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        //auth user
        // auth()->attempt([
        //     'email'=> $request->email,
        //     'password'=> $request->password
        // ]);

        //other way of authenticate
        auth()->attempt($request->only('email', 'password'));

        // re-direct the user to his wall
        return redirect()->route('posts.index');
    }
}
