{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Image Upload</title>--}}
{{--</head>--}}
{{--    <body>--}}
{{--        <h1>Image uploaded</h1>--}}
{{--        --}}{{-- <img src="{{ asset('images/'.$imageName) }}" alt="Uploaded Image"> --}}

{{--        <form method="POST" action="{{ url('admin/upload') }}" enctype="multipart/form-data"> --}}{{-- When upload finish where do i want it to redirect to --}}
{{--            @method('POST')--}}
{{--            @csrf--}}
{{--            <input type="file" name="image">--}}
{{--            <button type="submit">Upload</button>--}}
{{--        </form>--}}
{{--    </body>--}}
{{--</html>--}}
@extends('layouts.app')

@section('content')
    {{-- Error and Status Card --}}

    @if(Session::has('message'))
        <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
            <strong>{{ Session::get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                <strong>{{$error}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    <div class="container">
        <div class="row">
            {{-- Upload form and picture  --}}
            <div class="col-lg-6">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="text-primary">Upload Image</h3><br>
                        <form action="{{ action('App\Http\Controllers\ImageController@store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="image">Upload Picture</label>
                                <br>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 pt-lg-0 pt-3">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h3 class="text-primary">Image fetched from Firebase Storage.</h3>
                        <img src="{{ $image }}" class="img-fluid" alt="Responsive image">
                        <br>
                        <a href="{{ $image }}">Link generated from Firebase</a>
                        <form method="POST" action="{{ action('App\Http\Controllers\ImageController@destroy', 'delete') }}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group pt-2">
                                <button type="submit" class="btn btn-danger">Delete Image</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection()
