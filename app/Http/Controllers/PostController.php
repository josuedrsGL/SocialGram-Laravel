<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //

    public function index(User $user){
        // dd(auth()->user()); //helper to authentication
        // dd('this is my wall');
        // dd($user);
        $posts = Post::where('user_id', $user->id)->paginate(5);
        // dd($posts);
        return view('wall', ['user' => $user, 'posts' => $posts]);
    }

    public function create(){
        // dd('posting...');
        return view('posts.create');
    }

    public function store(Request $request){
        // dd('publishing....');
        $this->validate($request, [
            'title' => 'required|max:225',
            'description'=> 'required',
            'image' => 'required'
        ]);
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        //other way to create records
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post) {
        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post){
        // if($post->user_id === auth()->user()->id){
        //     dd('Si es la misma persona');
        // } else {
        //     dd('no es la misma');
        // }
        $this->authorize('delete', $post);
        $post->delete();

        //delete image
        $image_path = public_path('uploads/' . $post->image);

        if(File::exists($image_path)){
            unlink($image_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
