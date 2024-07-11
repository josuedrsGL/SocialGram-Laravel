@extends('layouts.app')

@section('title')
  Login into SocialGram
@endsection 

@section('content')
  <div class="md:flex md:justify-center md:gap-8 md:items-center p-5">
    <div class="md:w-2/5">
      <img src="{{asset('img/login.jpg')}}" alt="login image" class="">
    </div>

    <div class="md:w-1/2 bg-white p-6 shadow-xl rounded-lg">
      <form action="{{route('login')}}" method="POST" novalidate>
      @csrf {{-- Cross site request --}}
        @if (session('message'))
          <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> 
            {{ session('message') }} 
          </p>
        @endif
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
            Email
          </label>
          <input name="email" type="text" placeholder="Type your email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
          value="{{old('email')}}">
          @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
            Password
          </label>
          <input name="password" type="password" placeholder="Type your password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
          @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
          @enderror
        </div>

        <input type="submit" value="Login" class="bg-sky-600 hover:bg-sky-700 transition-colors 
        cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        
      </form>
    </div>

  </div>

@endsection