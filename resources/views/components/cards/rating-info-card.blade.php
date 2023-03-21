<div class="bg-white opacity-70 rounded-lg shadow-lg p-4 pr-7">
    <div class='flex flex-row justify-between mb-4'>
        <h2 class="text-lg font-semibold mb-2 flex-col">{{$header}}</h2>
        <img src="{{asset('images/edit_icon.png')}}" class="w-[0.85rem] h-[0.85rem] flex-col">

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


    <div class="flex flex-col text-gray-700 mb-4">
        <div class="flex-row my-3">
            <div class="bg-blue-500 w-3.5 h-3.5 items-center justify-center flex rounded-full">
                <img src="{{asset('images/Q_icon.png')}}" class="w-[0.65rem] h-[0.65rem] flex-col float-left">

            </div>
            <h1>{{$title1}}</h1>


            <div>{{$desc1}}</div>


        </div>

        <div class="flex-row my-3">
            <div class="bg-blue-500 w-3.5 h-3.5 items-center justify-center flex rounded-full">
                <img src="{{asset('images/Q_icon.png')}}" class="w-[0.65rem] h-[0.65rem] flex-col">

            </div>
            <h1>{{$title1}}</h1>


            <div class="">{{$desc1}}</div>


        </div>

        <div class="flex-row my-3">
            <div class="bg-blue-500 w-3.5 h-3.5 items-center justify-center flex rounded-full">
                <img src="{{asset('images/Q_icon.png')}}" class="w-[0.65rem] h-[0.65rem] flex-col">

            </div>
            <h1>{{$title1}}</h1>


            <div>{{$desc1}}</div>


        </div>




    </div>


</div>
