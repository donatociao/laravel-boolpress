@extends('layouts.app')

@section('content')
  <div class="row">
   <div class="col-sm-8 offset-sm-2">
      <a href="{{route('admin.posts')}}"><button class="btn btn-primary float-right " type="button" name="button">< Indietro</button></a>
      <h1 class="display-3">Crea nuovo post</h1>
    <div>
        <form method="post" action="{{ route('admin.posts.store') }}">
          @csrf
          <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
            <label for="author">Autore</label>
            <input type="text" class="form-control" name="author"/>
          </div>
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea type="text" class="form-control" name="content" rows="8"></textarea>
          </div>
          <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="custom-select form-control" id="inputGroupSelect01" name="category_id">
              <option selected>Scegli categoria...</option>
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Crea" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
