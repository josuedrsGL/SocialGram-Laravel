@extends('layouts.app')

@section('title')
  Profile: {{$user->username}}
@endsection

@section('content')
<div class="flex justify-center">
  <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
    <div class="sm:w-2/6 md:w-8/12 lg:w-6/12 px-5">
      <img src="{{ $user->image ? asset("profiles") . '/' . $user->image : asset('img/user.png')}}" alt="user image">
    </div>
    <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start md:py-10 py-10">
      <div class="flex  items-center gap-2">
        <p class="text-gray-700 text-2xl mb-5">
          {{$user->username}}
        </p>
        @auth
          @if($user->id === auth()->user()->id)
            <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>            
            </a>
          @endif
        @endauth
      </div>
      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $user->followers()->count()}}
        <span class="font-normal"> @choice('Follower|Followers', $user->followers()->count())</span>
      </p>

      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{-- {{ $user->posts->count()}} --}}
        {{ $user->followings()->count()}}
        <span class="font-normal"> Followings</span>
      </p>

      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $user->posts->count()}}
        <span class="font-normal"> Posts</span>
      </p>
      @auth
        @if (auth()->user()->id !== $user->id)
          @if (!$user->alreadyFollower(auth()->user()))
              
            <form method="POST" action="{{ route('users.follow', $user) }}">
              @csrf
              <input 
              type="submit"
              class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
              value="Follow"
              >
            </form>
          @else
            <form method="POST" action="{{ route('users.unfollow', $user)}}">
              @csrf
              @method('DELETE')
              <input 
              type="submit"
              class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
              value="Unfollow"
              >
            </form>
          @endif
        @endif
      @endauth
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