<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store(User $user, Request $request)
    {
        // dd("From user: $user | From Request: $request->user ");
        $user->followers()->attach(auth()->user()->id);
        return back();
    }
    
    public function destroy(User $user, Request $request)
    {
        // dd("From user: $user | From Request: $request->user ");
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
