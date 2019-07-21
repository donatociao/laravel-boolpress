@extends('layouts.app')


  @section('content')
    <div class="container">
      <h1>{{$post->title}}</h1>
      <p>{{$post->content}}</p>
      <em>Scritto da {{$post->author}}</em> <small>il {{$post->created_at}}.</small>
      <br><b>Ultima modifica: {{$post->updated_at}}</b>
    </div>
  @endsection
