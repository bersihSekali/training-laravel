@extends('layout.main')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-warning mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/post-category/create" class="btn btn-info mt-3">Add Category</a>
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($datas as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description}}</td>
                    <td>
                        <form action="/post-category/{{ $data->id }}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <a href="/post-category/{{ $data->id }}/edit" class="btn btn-info">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
  </table>
@endsection