@extends('components.layout', ['title' => 'Admin Dashboard'])
@section('content')

    @if(session('status'))
        <h4 class="w-full h-10 p-3 bg-red-700 mb-2 justify-center">{{session('status')}}</h4>
    @endif

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
@includeIf('components.table.table-feature', ['title' => 'Admin'])
@includeIf('components.table.table', ['refTable' => $admin])
@endsection
