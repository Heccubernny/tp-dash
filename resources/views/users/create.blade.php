@extends('components.layout', ['title' => 'My Website']);
@section('content')
<form action="{{url('users/')}}" method="POST">
    @csrf
    {{-- @method('POST') --}}
    <label>Name</label>
    <input type="text" name="name" id="name">
    <label>Email</label>
    <input type="email" name="email" id="email">
    <label>Password</label>
    <input type="password" name="password" id="password">

    <button>
        <button type="submit" onclick="return console.log('added successfully')"
            class="bg-green-600 px-10 py-3 rounded-md text-white border">Add</button>
</form>
@endsection
