@extends('layout.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('error'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <main class="form-signin">
                <form action="/post-category" method="post">
                    @csrf

                    <h1 class="h3 mb-3 fw-normal text-center">Form Add Category</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                        <label for="name">Name</label>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating">
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="description"></textarea>
                        <label for="description">Description</label>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Add Category</button>
                </form>
            </main>
        </div>
    </div>
@endsection