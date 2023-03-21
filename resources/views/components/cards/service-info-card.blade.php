<div class="bg-white w-50 opacity-70 rounded-lg shadow-lg p-4 pr-7">
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
            {{$title1}}: {{$name1}}
        </div>

        <div class="flex-row my-3">
            {{$title2}}: {{$name2}}
        </div>
        <div class="flex-row my-3">
            {{$title3}}: {{$name3}}
        </div>
        <div class="flex-row my-3">
            {{$title4}}: {{$name4}}
        </div>

        <div class="flex-row my-3">
            {{$title5}}: {{$name5}}
        </div>
        <div class="flex-row my-3">
            {{$title6}}: {{$name6}}
        </div>

    </div>


</div>
