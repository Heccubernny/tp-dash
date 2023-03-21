@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">

                        @if(Session::has('message'))
                            <div class="alert alert-info alert-dismissible fade show">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            @endforeach
                        @endif

{{--                        {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\Auth\ResetController@store']) !!}--}}

{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('email', 'Email:') !!}--}}
{{--                            {!! Form::email('email', null, ['class'=>'form-control'])!!}--}}
{{--                        </div>--}}


{{--                        <div class="form-group">--}}
{{--                            {!! Form::submit('Sent Email', ['class'=>'btn btn-primary']) !!}--}}
{{--                        </div>--}}

{{--                        {!! Form::close() !!}--}}

                            <form method="POST" action="{{ action('App\Http\Controllers\Auth\ResetController@store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Sent Email</button>
                                </div>

                            </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
