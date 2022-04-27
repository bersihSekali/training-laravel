@extends('layout.main')

@section('content')
    <h1>{{ $judul }}</h1>
    
    @foreach($posts as $post)
        <article>
            <a href="/singlePost/{{ $post['slug'] }}"><h4>{{ $post['title'] }}</h4></a>
            <p>{{ $post['body'] }}</p>
        </article>
    @endforeach
@endsection