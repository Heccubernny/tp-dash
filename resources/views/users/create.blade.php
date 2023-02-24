@extends('components.layout', ['title' => 'My Website']);
@section('content')
<form action="{{route('users-store')}}" method="POST">
    @csrf
    {{-- @method('POST') --}}
    <label>Name</label>
    <input type="text" name="name" id="name">
</form>
@endsection
