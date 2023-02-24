{{-- show the list of orders per selected location --}}
<h1>Orders</h1>

     {{-- @foreach ($orders as $order)
         <div class="p-4 border border-black">
             <a href="{{ route('orders.show', $order) }}">
                 <div>Order #: {{ $order->id }}</div>
                 <div>Customer: {{ $order->customer->name }}</div>
                 <div>Location: {{ $order->location->name }}</div>
                 <div>Status: {{ $order->status }}</div>
                 <div>Created: {{ $order->created_at }}</div>
                 <div>Updated: {{ $order->updated_at }}</div>
             </a>
         </div>
     @endforeach --}}
{{-- {!! $chart->render() !!} --}}
{!! $chart->container() !!}


{{$chart->container() }}


     {{-- <div class="text-[10px]"> --}}
     {{-- <div>
         <a href="{{ route('orders.index') }}">Create</a>
     </div>

     <div>
         <form action="{{ route('orders.index') }}" method="GET">
             <div>
                 <label for="location">Location</label>
                 <select name="location" id="location">
                     <option value="">All</option>
                     @foreach ($locations as $location)
                         <option
                             value="{{ $location->location }}"
                             {{ $location->location == request('location') ? 'selected' : '' }}
                         >
                             {{ $location->location }}
                         </option>
                     @endforeach
                 </select>
             </div>
             <div>
                 <label for="status">Status</label>
                 <select name="status" id="status">
                     <option value="">All</option>
                     @foreach ($statuses as $status)
                         <option
                             value="{{ $status->status }}"
                             {{ $status->status == request('status') ? 'selected' : '' }}
                         >
                             {{ ucfirst($status->status) }}
                         </option>
                     @endforeach
                 </select>
             </div>
             <div>
                 <label for="sort">Sort</label>
                 <select name="sort" id="sort">
                     <option value="">Default</option>
                     <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>ASC</option>
                     <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>DESC</option>
                 </select>
             </div>
             <div>
                 <button type="submit">Filter</button>
             </div>
         </form>
     </div>

     <div> --}}
