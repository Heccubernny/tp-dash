@extends('components.layout')
<x-header>
    <x-slot:title>
        Admin Overview
    </x-slot:title>
</x-header>
<main class="p-4">

    @section('content')
    <h1>Order Status Counts</h1>

    @foreach ($counts as $status => $count)
    <div>{{ ucfirst($status) }}: {{ $count }}</div>
    @endforeach
    <div>Pending: {{ $counts['pending'] }}</div>
    <div>Total: {{ $total }}</div>

    {{-- @foreach ($locations as $location => $statuses)
    <h2>{{ $locations }}</h2>
    @foreach ($statuses as $status)
    <div>{{ ucfirst($status->status) }}: {{ $status->count }}</div>
    @endforeach
    @endforeach --}}

    <div>
        {{-- <a href="{{ route('orders.index') }}">Back to Orders</a> --}}
    </div>


    <div>
        <a href="{{ route('orders.status-count') }}">Refresh</a>

        <form action="{{ route('orders.status-count') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete All</button>
        </form>
    </div>

    <div>
        @foreach ($orderPage as $order)
        <div>
            <a href="{{ route('orders.index', $order) }}">{{ $order->location }}</a>
        </div>
        @empty($order)
        <div>No items Saved yet</div>
        @endempty
        @endforeach



        {{-- @foreach ($locations as $location => $count)
    <div>{{ ucfirst($location) }}: {{ $count }}
    </div>
    @endforeach
    <div>Total: {{ $total }}</div> --}}
    {{-- foreach ($orders as $order) {
    $location = $order['location'];
    if (isset($locationCounts[$location])) {
        $locationCounts[$location]++;
    } else {
        $locationCounts[$location] = 1;
    }
}

// Print out the counts for each location
foreach ($locationCounts as $location => $count) {
    echo "Location: $location - Count: $count\n";
} --}}
    </div>
    <div class="text-[10px]">
        {{ $orderPage->links() }}
    </div>

</main>

</div>

{{-- <div>Locations {{ $locations}} </div> --}}
{{-- <div>Locations {{$total_location}} </div> --}}
@endsection
<x-footer />
