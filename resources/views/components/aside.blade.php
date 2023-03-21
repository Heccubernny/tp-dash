<div class="left-0 mb-8">
    <a class="text-xl font-bold text-white" href="#">TASKPADI</a>
</div>
<ul class="flex flex-col py-4 space-y-9">
    <li class="px-4 hover:bg-[#27159F] hover:w-full hover:h-10">
        <a href="{{url('/dashboard/overview', [])}}" class="flex items-center text-sm font-semibold text-gray-900 ">
            <span class="inline-flex items-center justify-center h-10 w-6 text-gray-600">
                <i class="fas fa-tachometer-alt"></i>
            </span>
            <span class="ml-2 text-white">{{ __('Dashboard') }}</span>
        </a>
    </li>
    <li class="px-4 hover:bg-[#27159F] hover:w-full hover:h-10">
        <i class='fas fa-home'></i>
        <a href="{{ url('/users/index', []) }}" class="flex items-center text-sm font-semibold text-gray-900 ">
            <span class="inline-flex items-center justify-center h-10 w-6 text-gray-600">
                <i class="fas fa-users"></i>
            </span>
            <span class="ml-2 text-white">{{ __('All User') }}</span>
        </a>
    </li>
    <li class="px-4 hover:bg-[#27159F] hover:w-full hover:h-10">
        <i class='fas fa-home'></i>
        <a href="{{ url('admin/roles', []) }}" class="flex items-center text-sm font-semibold text-gray-900 ">
            <span class="inline-flex items-center justify-center h-10 w-6 text-gray-600">
                <i class="fas fa-users"></i>
            </span>
            <span class="ml-2 text-white">{{ __('Roles') }}</span>
        </a>
    </li>
    <li class="px-4 hover:bg-[#27159F] hover:w-full hover:h-10">
        <a href="#" class="flex items-center text-sm font-semibold text-gray-900 ">
            <span class="inline-flex items-center justify-center h-10 w-6 text-gray-600">
                <i class="fas fa-cog"></i>
            </span>
            <span class="ml-2 text-white">{{ __('Settings') }}</span>
        </a>
    </li>
</ul>
