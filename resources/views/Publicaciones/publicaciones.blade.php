@extends('layauts.app')

@section('title', 'publicaciones')
@section('content')
<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

<h1 class="text-3xl text-center font-bold">Publicacion</h1>

<form class="mt-4" method="POST" action="{{ route('publi.poste') }}">
@csrf  
@if (session ('success'))
    <h6 class="alert alert-success">{{ session('success')}}</h6>
@endif
@error('title')        

    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">* {{ $message }}</p>
@enderror

<input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Titulo"
    id="title" name="title" value="{{ old('title') }}" required>

@error('desc')        

    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">* {{ $message }}</p>

@enderror

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-8 my-1 focus:bg-white" placeholder="Descripcion"
    id="desc" name="desc" value="{{ old('desc') }}" required>

@error('date')        

    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">* {{ $message }}</p>
@enderror
    

    <input type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="fecha"
    id="date" name="date" value="{{ old('date') }}" required>

    <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-indigo-600">Enviar</button>
</form>
</div>
@endsection
