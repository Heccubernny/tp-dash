@if (!empty($refTable))

    @forelse($refTable as $key => $item)
<tr class='bg-[#E9EbE9]'>
    {{-- <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{$i}}</div>

    </td> --}}

    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex-shrink-0 h-10 w-10">
            <img class="h-10 w-10 rounded-md" src="{{$item['image']}}" alt="">
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-[#70768C]">{{$item['fullName']}}</div>
    </td>
    <td class=" px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-[#70768C]">+{{$item['phone']}}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-[#70768C]">{{$item['email']}}</div>
    </td>


{{--    @if($item['status'] == 1)--}}
{{--    <td class="px-6 py-4 whitespace-nowrap">--}}
{{--        <div class="text-sm text-[#70768C]">Active</div>--}}
{{--    </td>--}}
{{--    @else--}}
{{--        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--            <div class="text-sm text-[#70768C] bg-[#FF0000]">Inactive</div>--}}
{{--        </td>--}}
{{--    @endif--}}
    <td class="px-6 py-4 whitespace-nowrap">
{{--        <div class="bg-blue-500">--}}
            <p class="text-sm text-[#ffffff] bg-[#21AC82] font-semibold py-2 px-4 flex text-[14px] items-center justify-center rounded-md">
{{--               {{ $user['lastActivity']}}--}}
                Active
            </p>
{{--        </div>--}}
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center space-x-1">
            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2">
                <img src="{{asset('images/verified_badge_icon.png')}}" class="w-[1.2rem] h-[1.2rem] flex-col">

            </a>
            <a href="#" class="text-red-600 hover:text-red-900">
                <img src="{{asset('images/pen_icon.png')}}" class="w-[1.2rem] h-[1.2rem] flex-col">

            </a>
            <a href="#" class="text-red-600 hover:text-red-900">
                <img src="{{asset('images/delete_table_icon.png')}}" class="w-[1.2rem] h-[1.2rem] flex-col">

            </a>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <button
            class="bg-[#27159F] hover:bg-blue-700 text-white font-semibold py-2 px-8 text-[14px] items-center justify-center rounded-md">
            Login
        </button>
    </td>
    </tr>
    @empty
        <tr>
            <td colspan="7">Data Is not Available yet</td>
        </tr>
    @endforelse
@endif
