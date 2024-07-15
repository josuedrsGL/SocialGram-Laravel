@extends('layouts.app')

@section('title')
  Profile: {{$user->username}}
@endsection

@section('content')
<div class="flex justify-center">
  <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
    <div class="sm:w-2/6 md:w-8/12 lg:w-6/12 px-5">
      <img src="{{asset("img/user.png")}}" alt="user image">
    </div>
    <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start md:py-10 py-10">
      <p class="text-gray-700 text-2xl mb-5">
        {{$user->username}}
      </p>

      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal"> Followers</span>
      </p>

      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal"> Followings</span>
      </p>

      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal"> Posts</span>
      </p>

    </div>
  </div>
</div>

<section class="container mx-auto mt-10">
  <h2 class="text-4xl text-center font-black my-10">Publishments</h2>

  @if (!count($posts))
      <p class="text-gray-600 uppercase text-sm text-center font-bold">There are no posts available yet</p>
  @else
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($posts as $post)
        <div>
          <a href="{{ route('posts.show', ['post' => $post, 'user'=> $user]) }}">
            <img src="{{ asset('uploads') . '/' . $post->image}}" alt="Post image {{$post->title}}">
          </a>
        </div>
      @endforeach
    </div>
    <div>
      {{$posts->links('pagination::tailwind')}}
    </div>
  @endif

</section>
@endsection