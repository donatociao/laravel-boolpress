@extends('layouts.app')


@section('content')
<div class="container">
  <h1>Elenco Posts</h1>
  <ul>
  @forelse ($posts as $post)

    <li>
      <a href="{{route('posts.show', $post->slug)}}">{{ $post->title }}</a>,
      di {{$post->author}}, del {{$post->created_at}}
      <em>
        @if (!empty($post->category))
          - Categoria: <a href="{{route('posts.categories', $post->category->slug)}}">{{$post->category->name}}</a>
        @endif
    </li>
  @empty
    <p>Non ci sono posts.</p>

  @endforelse
  </ul>
  {{ $posts->links() }}
</div>
@endsection
