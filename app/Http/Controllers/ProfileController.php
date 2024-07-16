<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    //
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        // dd('saving changes');
        $this->validate($request,[
            'username' => ['required','unique:users','min:3','max:20', 'not_in:twitter, editar-perfil']
        ]);
        // return view('profile.index');

        if($request->image){
            $image = $request->file('image');

            $imageName = Str::uuid() . "." . $image->extension();

            $serverImage = Image::read($image);
            $serverImage->resizeDown(1000,1000);

            $pathImage = public_path('profiles') . '/' . $imageName;
            $serverImage->save($pathImage);
        }

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? '';
        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
