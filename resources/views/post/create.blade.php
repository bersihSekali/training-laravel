@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('error'))
                <div class="alert alert-warning mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <main class="form-signin">
                <form action="/post" method="post">
                    @csrf

                    <h1 class="h3 mb-3 fw-normal text-center">Form Add Post</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="title" value="{{ old('title') }}">
                        <label for="title">Title</label>

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mt-3">
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="author" value="{{ old('author') }}">
                        <label for="author">Author</label>

                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <select class="form-select mt-3" aria-label="Default select example" name="post_category" id="post_category">
                        <option selected>Choose post category</option>
                        @foreach($postCategory as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                      </select>
                    
                      <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="body" id="floatingTextarea2" style="height: 100px" name="body" id="body"></textarea>
                        <label for="body">Body</label>

                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
    
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Add Post</button>
                </form>
            </main>
        </div>
    </div>
@endsection