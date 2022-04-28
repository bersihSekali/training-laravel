@extends('layout.main')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-warning mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/post/create" class="btn btn-info mt-3">Add Post</a>
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Post Category</th>
                <th scope="col">Author</th>
                <th scope="col">Body</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                
            </tr>
        </tbody>
    </table>
@endsection