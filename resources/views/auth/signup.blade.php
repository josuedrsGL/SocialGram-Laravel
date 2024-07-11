@extends('layouts.app')

@section('title')
  Sign up in SocialGram
@endsection 

@section('content')
  <div class="md:flex md:justify-center md:gap-8 md:items-center p-5">
    <div class="md:w-2/5">
      <img src="{{asset('img/registrar.jpg')}}" alt="signup image" class="">
    </div>

    <div class="md:w-1/2 bg-white p-6 shadow-xl rounded-lg">
      <form action="{{ route('register') }}" method="POST" novalidate>
      @csrf {{-- Cross site request --}}
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
            Name
          </label>
          <input 
            name="name" type="text" placeholder="Type your name" 
            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
            value="{{old('name')}}"
          >
          @error('name')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
            Username
          </label>
          <input name="username" type="text" placeholder="Type your username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
          value="{{old('username')}}">
          @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
          @enderror   
        </div>

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

        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
            Password confirmation
          </label>
          <input name="password_confirmation" type="password" placeholder="Re-type your password" class="border p-3 w-full rounded-lg">
          
        </div>

        <input type="submit" value="Sign up" class="bg-sky-600 hover:bg-sky-700 transition-colors 
        cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        
      </form>
    </div>

  </div>

@endsection