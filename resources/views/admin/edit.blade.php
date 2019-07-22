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
              <textarea type="text" class="form-control" name="content" rows="12">{{old('content', $post->content)}}</textarea>
          </div>
          <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="custom-select form-control" id="inputGroupSelect01" name="category_id">
              <option selected>Scegli Categoria...</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">
                  {{$category->name}}
                </option>
              @endforeach
            </select>
              </div>
          </div>
          <div class="form-group">
              <input type="submit" value="Modifica" class="btn btn-success">
          </div>
      </form>
    </div>
  </div>
@endsection
