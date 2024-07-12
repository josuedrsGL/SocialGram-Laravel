<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImageController extends Controller
{
    //
    public function store(Request $request){

        // $input = $request->all();
        $image = $request->file('file');

        $imageName = Str::uuid() . "." . $image->extension();

        $serverImage = Image::read($image);
        $serverImage->resizeDown(1000,1000);

        $pathImage = public_path('uploads') . '/' . $imageName;
        $serverImage->save($pathImage);

        return response()->json(['image' => $imageName]);
    }
}
