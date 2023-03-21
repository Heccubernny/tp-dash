@extends('components.layout')


@section('content')
<div class="container flex flex-row">
        @if(session('status'))
        <h4 class="w-full h-10 p-3 bg-red-700 mb-2 justify-center">{{session('status')}}</h4>
        @endif
{{--        <div>Testing House be this</div>--}}
{{--        <h1>Notification</h1>--}}
            <div class="my-14">
                <button id='noti'> Click me </button>
                <a href="{{ url('orders/add') }}" class="my-10 mx-10 px-3 py-3 rounded-md bg-[#4169e1]">Add new Order</a>
            </div>

</div>
    <div class="container flex flex-row">

        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Location</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>


            </tr>
            </thead>
            <tbody>

            @if (!empty($orders))
                @forelse($orders as $key => $order)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $order['location']}}</td>
                    <td>{{ $order['status'] }}</td>
                    <td><a href="{{url('edit-order/'.$key)}}" class="">Edit</a></td>
                    <td><a href="{{url('delete-order/'.$key)}}" class="">Delete</a></td>

                </tr>
                @empty
                    <tr>
                        <td colspan="7">Data Is not Available yet</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>

    </div>
@endsection

        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js">
        </script>

        <script>
            btn = document.getElementById('noti');
        btn.addEventListener('click', () => {
        Push.create("Hello world!", {
        body: "How's it hangin'?",
        icon: '/icon.png',
        timeout: 4000,
        onClick: function ()
        {
        window.focus();
        this.close();
        }
        });
        });


        </script>

        <script>
            console.log('hello');
        </script>

