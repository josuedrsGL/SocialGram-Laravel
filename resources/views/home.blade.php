@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user'=> $post->user]) }}">
                <img src="{{ asset('uploads') . '/' . $post->image}}" alt="Post image {{$post->title}}">
                </a>
            </div>
            @endforeach
        </div>
        <div>
            {{$posts->links('pagination::tailwind')}}
        </div>
    @else
        <p>No hay post</p>
    @endif
@endsection
