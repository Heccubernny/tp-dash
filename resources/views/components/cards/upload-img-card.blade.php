<div class="bg-white opacity-70 rounded-lg shadow-lg p-4 pr-7">
    <div class='flex flex-row justify-between mb-4'>
        <h2 class="text-lg font-semibold mb-2 flex-col">{{$header}}</h2>
    </div>

    {{-- @props(['collection']) --}}

    {{-- @foreach ($collection as $item)
    <div class="flex text-gray-700 mb-4">
        <div class="flex-row">
            {{-- {{$item['title']}}: {{$title->name}} --}}
    {{-- {{$item}}
</div>
</div>
@endforeach --}}

    <div class="flex flex-wrap text-gray-700 mb-4">
        <div class="mx-3">
            <img src="{{asset('images/'.$img1.'.png')}}" class="w-[5rem] h-[5rem] flex-col">
            <img src="{{asset('images/delete_icon.png')}}" class="w-[0.7rem] h-[0.7rem] relative bottom-[18px] left-[60px] bg-white rounded-full px-2 py-2">

        </div>
        <div class="mx-3">
            <img src="{{asset('images/'.$img1.'.png')}}" class="w-[5rem] h-[5rem] flex-col">
            <img src="{{asset('images/delete_icon.png')}}" class="w-[0.7rem] h-[0.7rem] relative bottom-[18px] left-[60px] bg-white rounded-full px-2 py-2">

        </div>
        <div class="mx-3">
            <img src="{{asset('images/'.$img1.'.png')}}" class="w-[5rem] h-[5rem] flex-col">
            <img src="{{asset('images/delete_icon.png')}}" class="w-[0.7rem] h-[0.7rem] relative bottom-[18px] left-[60px] bg-white rounded-full px-2 py-2">

        </div>



    </div>


</div>
