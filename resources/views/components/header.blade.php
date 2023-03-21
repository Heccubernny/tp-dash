{{-- <header class="bg-[#27159F] px-4 py-3 fixed">
    <div class="flex justify-between items-center">



    </div>
</header> --}}
<nav class="fixed top-0 left-0 md:w-5/6 w-5/6 md:ml-auto z-12 right-0 bg-[#27159F] mb-4 text-white py-2 px-4 h-20 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <form class=" justify-center items-center">
            <div class="relative inline-block">
                <i class="fas fa-search absolute left-0.5 top-1/2 transform -translate-y-1/2 text-gray-500"></i>

                <div class="relative">
                    <input type="text" class="pl-8 w-96 text-black focus:outline-none rounded-md h-9 mt-3 ml-8" placeholder="Search...">
                    <img src="{{asset('images/search_icon.png')}}" class="w-[0.85rem] h-[0.85rem] absolute top-6 left-10 text-gray-400 mr-2">
                </div>
            </div>

        </form>

        <div class="flex items-center">


            <div class="flex items-center focus:outline-none mr-3">
                <svg class="fill-current text-white h-8 w-8 mr-2" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10 0a10 10 0 100 20 10 10 0 000-20zM9 14a1 1 0 112 0 1 1 0 01-2 0zm4-4a1 1 0 11-2 0 1 1 0 012 0zm-4-4a1 1 0 100 2 1 1 0 000-2z">
                    </path>
                </svg>
                <div class="flex flex-col items-start">
                    <span class="text-white text-sm mr-2">oluwasegun20@gmail.com</span>
                    <span class="text-white text-md">Logout</span>
                </div>

            </div>
            {{-- <button class="flex items-center focus:outline-none">
                <svg class="fill-current text-white h-6 w-6" viewBox="0 0 24 24">
                  <path d="M19 18H5a1 1 0 010-2h14a1 1 0 010 2zM19 13H5a1 1 0 010-2h14a1 1 0 010 2zM19 8H5a1 1 0 010-2h14a1 1 0 010 2z"></path>
                </svg>
              </button> --}}
        </div>
        {{--
        <ul class="flex">
            <li><a href="#" class="px-4 hover:text-gray-300">Home</a></li>
            <li><a href="#" class="px-4 hover:text-gray-300">About</a></li>
            <li><a href="#" class="px-4 hover:text-gray-300">Contact</a></li>
        </ul> --}}
    </div>
</nav>
