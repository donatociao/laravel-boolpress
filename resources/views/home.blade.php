@extends('layouts.app')


@section('content')
<div class="container">
  <h1>Elenco Posts</h1>
  <ul>
  @forelse ($posts as $post)

    <li>
      <a href="{{route('posts.show', $post->slug)}}">{{ $post->title }}</a>,
      di {{$post->author}}, del {{$post->created_at}}
    </li>


  @empty
    <p>Non ci sono posts.</p>

  @endforelse
  </ul>
</div>
@endsection
