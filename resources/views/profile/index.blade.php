@extends('layouts.app')

@section('title')
  Edit profile: {{auth()->user()->username}}
@endsection 

@section('content')
  <div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
      <form method="POST" action="{{route('profile.store')}}" class="mt-10 md:mt-0" enctype="multipart/form-data">
        @csrf {{-- Cross site request --}}
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username
          </label>
          <input 
            name="username" type="text" placeholder="Type your username" id="username"
            class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
            value="{{ auth()->user()->username }}"
          >
          @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
          @enderror
        </div>
        
        <div class="mb-5">
          <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
            image
          </label>
          <input 
            name="image" type="file" id="image"
            class="border p-3 w-full rounded-lg"
            accept=".jpg, .jpeg, .png"
          >
        </div>

        <input type="submit" value="Save changes" class="bg-sky-600 hover:bg-sky-700 transition-colors 
        cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>

  </div>
@endsection