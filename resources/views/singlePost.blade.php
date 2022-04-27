@extends('layout.main')

@section('content')
    <h1>{{ $judul }}</h1>
    
    <article>
        <a href="/post/{{ $post['slug'] }}"><h4>{{ $post['title'] }}</h4></a>
        <p>{{ $post['body'] }}</p>
    </article>

    <a href="/post">Back to post</a>
@endsection