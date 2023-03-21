<div class="flex justify-start mb-2">
    <a href="{{ route('users.index', ['tab' => 'users']) }}" class="bg-white px-3 py-3 drop-shadow-2xl inline-flex items-start font-bold text-[16px] leading-5 focus:outline-none transition duration-150 ease-in-out px-4 py-2 border-2 border-white rounded-l-lg {{ $activeTab === 'users' ? 'text-black' : ' text-gray-500 hover:text-gray-700 hover:border-gray-300' }} {{ $activeTab === 'users' ? 'is-active' : '' }}" >Users</a>
    <a href="{{ route('users.index',['tab' => 'service_providers']) }}" class="bg-white px-3 py-3 drop-shadow-2xl inline-flex items-start font-bold text-[16px] leading-5 focus:outline-none transition duration-150 ease-in-out px-4 py-2 border rounded-r-lg {{ $activeTab === 'service_providers' ? 'text-black' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} {{ $activeTab === 'service_providers' ? 'is-active' : '' }}" >Service Provider</a>
</div>


