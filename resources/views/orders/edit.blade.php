@extends('components.layout')
@section('content')

    <div>
        <a href="{{ url('/orders/add') }}" class="my-10 mx-10 px-3 py-3 rounded-md bg-[#4169e1]">Add new Orders</a>
        <form action="{{url('/update-order/'.$key)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="transform-gpu mb-3 justify-center flex">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" value="{{$editData['location']}}">

            </div>
            <div class="transform-gpu mb-3 justify-center flex">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" value="{{$editData['status']}}">
            </div>

            <div class="transform-gpu mb-3 justify-center flex">

                <button type="submit" class="rounded-md px-3 w-20 h-8 bg-red-500 font-bold text-amber-100 hover:bg-red-300 hover:text-gray-500">update</button>
            </div>

        </form>
    </div>
@endsection
