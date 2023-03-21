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


    <div class="flex flex-col text-gray-700 mb-4">
        <form method="POST" action="{{url('admin/1/edit')}}" enctype="multipart/form-data" class="form-horizontal">
        <div class="flex-row my-3">
            {{$title1}}

{{--            <img src="{{asset('images/download_icon.png')}}" class="w-[0.85rem] h-[0.85rem] flex-col">--}}
            <input type="checkbox"  name="status" class="float-right" value="false" @checked(old('status', 'active'))>
{{--//    $blog->status)>--}}

        </div>

        <div class="flex-row my-3">
            {{$title2}}
                        <input type="checkbox"  name="status" class="float-right" value="false" !@checked('Im checked')>

        </div>
        <div class="flex-row my-3">
            {{$title3}}
                        <input type="checkbox"  name="status" class="float-right" value="false" !@checked('Im checked')>

        </div>

        <div class="flex-row my-3">
            {{$title4}}
                        <input type="checkbox"  name="status" class="float-right" value="false" !@checked('Im checked')>

        </div>
        <div class="flex-row my-3">
            {{$title5}}
                        <input type="checkbox"  name="status" class="float-right" value="false" @checked('Im checked')>

        </div>
        <div class="flex-row my-3">
            {{$title6}}
                        <input type="checkbox"  name="status" class="float-right" value="false" @checked('Im checked')>

        </div>

        </form>
        <div>
            <button class="px-10 py-2 flex items-center float-right bg-[#27159F] rounded-md font-bold text-white">Save Role</button>
        </div>
    </div>



</div>
