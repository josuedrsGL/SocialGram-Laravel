@extends('layouts.app')

@section('title')
  {{ $post->title }}
@endsection 

@section('content')
  <div class="container mx-auto md:flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->image}} " alt="Image post {{ $post->title}}">
      
      <div>
        <p class="p-3">
          0 likes
        </p>
      </div>

      <div>
        <p class="font-bold">
          {{$post->user->username}}
        </p>
        <p class="text-sm text-gray-500">
          {{$post->created_at->diffForHumans()}}
        </p>
        <p class="mt-5">
          {{$post->description}}
        </p>
      </div>
      @auth
        @if ($post->user_id === auth()->user()->id)
            
          <form action=" {{route('posts.destroy', $post)}}" method="POST">
            @method('DELETE') {{-- spoofing --}}
            @csrf
            <input 
              type="submit"
              value="Delete post"
              class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
            >
          </form>
        @endif
          
      @endauth

    </div>

    <div class="md:w-1/2 p-5">
      <div class="shadow bg-white p-5 mb-5">
        @auth
          <p class="text-xl font-bold text-center mb-4">
            Comment to me
          </p>

          @if (session('message'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
              {{session('message')}}
            </div>
          @endif

          <form action=" {{ route('comments.store', ['post' => $post, 'user'=> $user])}}" method="POST">
            @csrf
            <div class="mb-5">
              <label for="Comment" class="mb-2 block uppercase text-gray-500 font-bold">
                Add a Comment
              </label>
              <textarea 
                id="comment"
                name="comment" type="text" placeholder="comment the post" 
                class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
              >
                {{old('comment')}}
              </textarea>
              @error('comment')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
              @enderror
            </div>

            <input type="submit" value="Publish" class="bg-sky-600 hover:bg-sky-700 transition-colors 
            cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
          </form>
        @endauth
        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
          @if ($post->comments->count())
            @foreach ($post->comments as $comment)
              <div class="p-5 border-gray-300 border-b">
                <a href=" {{route('posts.index', $comment->user)}} ">
                  {{ $comment->user->username}}
                </a>
                <p>{{ $comment->comment }}</p>
                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
              </div>
            @endforeach
          @else
            <p class="p-10 text-center"> There are no comments yet</p>
          @endif
        </div>
      </div>
    </div>

  </div>

@endsection
