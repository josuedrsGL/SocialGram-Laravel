@extends('layouts.app')

@section('title')
  New post
@endsection 

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
      <form 
        action="{{route('images.store')}}" 
        id="dropzone" 
        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items"
        enctype="multipart/form-data"
      >
      @csrf
      </form>
    </div>
    <div class="md:w-1/2 bg-white p-6 shadow-xl rounded-lg">
      <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf {{-- Cross site request --}}
          <div class="mb-5">
            <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
              Title
            </label>
            <input 
              id="title" type="text" placeholder="Title of publishment" 
              class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror"
              value="{{old('title')}}"
            >
            @error('title')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
              Name
            </label>
            <textarea 
              id="description"
              name="description" type="text" placeholder="description of publishment" 
              class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
            >
              {{old('description')}}
            </textarea>
            @error('description')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{$message}}</p>
            @enderror
          </div>
          <input type="submit" value="Publish" class="bg-sky-600 hover:bg-sky-700 transition-colors 
          cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
    </div>

  </div>
@endsection