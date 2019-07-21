@extends('layouts.app')

@section('content')
  <div class="container">
    <a href="{{route('admin.posts')}}">
      <button class="btn btn-primary float-right " type="button" name="button">< Indietro</button>
    </a>
    <h1 class="display-3">Modifica post: {{$post->id }}</h1>
    <div>
      <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
              <label for="title">Titolo</label>
              <input value="{{$post->title}}" type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="author">Autore</label>
              <input value="{{$post->author}} "type="text" class="form-control" name="author"/>
          </div>
          <div class="form-group">
              <label for="content">Contenuto</label>
              <textarea placeholder="{{$post->content}}" type="text" class="form-control" name="content" rows="12"></textarea>
          </div>
          <div class="form-group">
              <input type="submit" value="Modifica" class="btn btn-success">
          </div>
      </form>
    </div>
  </div>
@endsection
