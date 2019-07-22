@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="d-inline float-left">Gestione Posts</h1>
    <a href="{{route('admin.posts.create')}}"><button class="btn btn-success d-inline float-right" type="button" name="button">Crea nuovo post</button></a>
    <table class="table table-striped table-bordered " cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Slug</th>
          <th>Gestione</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($posts as $post)
        <tr>
          <th>{{$post->id}}</th>
          <th><a href="{{route('admin.posts.show', $post->slug)}}">{{ $post->title }}</a></th>
          <th>{{$post->author}}</th>
          <th>{{$post->slug}}</th>
          <th>
            <a href="{{route('admin.posts.edit', $post->id)}}">
              <button type="button" class="btn btn-primary d-inline" name="button">Modifica</button>
            </a>
            <form action="{{route('admin.posts.destroy', $post->id)}}"  method="POST">
              @method('DELETE')
              @csrf
              <input type="submit" class="btn btn-danger d-inline mt-2" value="Cancella">
            </form>
          </th>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  </div>
@endsection
