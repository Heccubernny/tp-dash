@extends('components.layout')


@section('content')
<div class="flex flex-row justify-between">

    <div class="w-3/4">
{{--        TODO:: redo the chart and query it from the right database--}}
        {{-- {!! dd($chart->container()) !!} --}}
        {!! $chart->container(
        ) !!}
        {{-- https://screenrec.com/share/1LbxCUaEqn  ddscreenshot --}}
    </div>
    <div class="w-1/4 task_box flex flex-col space-y-4 items-center">
        <div class="flex-row text-start w-48 py-4 shadow-md rounded-md px-3 bg-[#4169e1] opacity-80">
            <div class="text-[30px] font-bold">{{ $counts['complete'] }}</div>
            <h1 class="font-semibold text-[20px]">Tasks Complete</h1>
        </div>

        <div class="flex-row text-start w-48 py-4 shadow-md rounded-md px-3 bg-[#4169e1] opacity-80">
            <div class="text-[30px] font-bold">{{ $counts['pending'] }}</div>
            <h1 class="font-semibold text-[20px]">Tasks Pending</h1>
        </div>
        <div class="flex-row text-start w-48 py-4 shadow-md rounded-md px-3 bg-[#4169e1] opacity-80">
            <div class="text-[30px] font-bold">{{ $counts['decline'] }}</div>
            <h1 class="font-semibold text-[20px]">Tasks Declined</h1>
        </div>

    </div>

</div>
@if($chart)
{!! $chart->script() !!}
@endif


{{--
@foreach ($counts as $status => $count)
<div>{{ ucfirst($status) }}: {{ $count }}</div>
@endforeach
<div>Pending: {{ $counts['pending'] }}</div>
<div>Total: {{ $total }}</div> --}}

{{-- @foreach ($locations as $location => $statuses)
    <h2>{{ $locations }}</h2>
@foreach ($statuses as $status)
<div>{{ ucfirst($status->status) }}: {{ $status->count }}</div>
@endforeach
@endforeach --}}

<div>
    {{-- <a href="{{ route('orders.index') }}">Back to Orders</a> --}}
</div>

{{-- Table Code --}}
<div class="container mx-auto mt-[6rem] mb-[1rem]">
    <div>View All Task</div>
    <div class="flex  items-center py-4">
            <button class=" flex items-center outline outline-offset-2 outline-1 outline-black hover:bg-gray-300 text-black font-bold py-0.5 px-4" onclick="openModal()"
                id="filterBtn"><img src="{{asset('images/filter_icon.png')}}" class="w-[0.85rem] h-[0.85rem] mr-2"> FILTERS</button>
            <!-- Add your filter modal here -->
            @includeIf('components.modal.filter-modal')
            <button class="items-center outline outline-offset-2 outline-1 outline-black hover:bg-gray-300 text-black font-bold py-0.5 px-4">State</button>

    </div>
</div>

<table class="min-w-full divide-y rounded-md divide-gray-200">
    <thead class="mt-48">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location</th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tasks
                Ingested</th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tasks
                Pending</th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tasks
                Completed</th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tasks
                Declined</th>
        </tr>
    </thead>
    <tbody class="divide-y-8 divide-gray-200 mb-24">
        @foreach ($tasksByLocation as $task)
        <tr class="">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-[#70768C]">{{ $task->Location }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-[#70768C] text-center">{{ $task->TotalTasks }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-[#70768C] text-center"> {{ $task->TotalPendingTasks }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-[#70768C] text-center">{{ $task->TotalCompleteTasks }} </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-[#70768C] text-center"> {{ $task->TotalDeclinedTasks }} </div>
            </td>
        </tr>
        @empty($task)
        <tr class="text-[24px]">No items Saved yet</tr>
        @endempty
        @endforeach
    </tbody>
</table>

{{-- <div>
    <a href="{{ route('orders.status-count') }}">Refresh</a>

<form action="{{ route('orders.status-count') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete All</button>
</form>
</div> --}}

{{-- <div>
    @foreach ($orderPage as $order)
    <div>
        <a href="#">{{$order->location }}</a>
</div>
@empty($order)
<div>No items Saved yet</div>
@endempty
@endforeach
</div> --}}





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
<div class="container text-[10px]">
    {{ $tasksByLocation->links() }}
</div>




{{-- <div>Locations {{ $locations}} </div> --}}
{{-- <div>Locations {{$total_location}} </div> --}}
@endsection

@push('scripts')
<script>
    // Modal script goes here

    // // Function to close the modal
    function closeModal() {
    document.getElementById("filterModal").classList.add("hidden");
    document.body.classList.remove("overflow-hidden");
    }
    const filterBtn = document.getElementById('filterBtn');
    const filterModal = document.getElementById('filterModal');
    const cancelBtn = document.getElementById('cancelBtn');

    filterBtn.addEventListener('click', () => {
    filterModal.classList.remove('hidden');
    });

    cancelBtn.addEventListener('click', () => {
    filterModal.classList.add('hidden');
    });

    // function to open the modal
    function openModal() {
    document.getElementById('filterModal').classList.remove('hidden');
    }
    document.getElementById('cancelBtn').addEventListener('click', function() {
    document.getElementById('filterModal').classList.add('hidden');
    });
    // var modal = document.getElementById("filterModal");
    // window.onclick = function(event) {
    // if (event.target !== modal) {
    // modal.style.display = "none";
    // }
    // }
    // function to get the modal

    const taskBox = document.querySelector('.task_box');
                gsap.to(taskBox, {
                duration:2,
                x: 200,
                });
</script>
@endpush


