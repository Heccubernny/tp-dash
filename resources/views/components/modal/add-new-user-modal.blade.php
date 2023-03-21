{{--<!-- Filter modal -->--}}
{{--<div id="addFormModal" class="hidden fixed z-10 inset-0 overflow-y-auto">--}}
{{--    <div class="flex items-center justify-center min-h-screen px-4">--}}
{{--        <div class="bg-white shadow-md rounded-lg p-6">--}}
{{--            <h2 class="text-lg font-medium mb-4">Filter Tasks</h2>--}}
{{--            <form action="{{ route('orders.status-count') }}" method="GET">--}}
{{--                <div class="grid grid-cols-1 gap-4">--}}
{{--                    <div>--}}
{{--                        <label for="location">Location</label>--}}
{{--                        --}}{{-- <select name="location" id="location">--}}
{{--                            <option value="">Select a location</option>--}}
{{--                            @foreach ($locations as $location)--}}
{{--                            <option value="{{ $location }}"> {{ $location }}</option>--}}
{{--                        @endforeach--}}
{{--                        </select> --}}

{{--                        <select name="location" id="location" class="form-select">--}}
{{--                            <option value="">Select a location</option>--}}
{{--                            @foreach ($locationsList as $location)--}}
{{--                                <option value="{{ $location->location }}">{{ $location->location }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="status">Status</label>--}}
{{--                        <div class="flex space-x-2">--}}
{{--                            <div>--}}
{{--                                <input type="checkbox" name="complete" id="completed" value="yes">--}}
{{--                                <label for="completed">Completed</label>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <input type="checkbox" name="decline" id="declined" value="yes">--}}
{{--                                <label for="declined">Declined</label>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <input type="checkbox" name="pending" id="pending" value="yes">--}}
{{--                                <label for="pending">Pending</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="flex justify-end mt-6">--}}
{{--                    <button type="submit"--}}
{{--                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                        Filter--}}
{{--                    </button>--}}
{{--                    <button id="cancelBtn" type="button"--}}
{{--                            class="ml-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"--}}
{{--                            onclick="closeModal()">--}}
{{--                        Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Upload modal -->
<div id="addFormModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-medium mb-4">Upload Information</h2>
            <form action="{{ url('/users/index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                        <input type="number" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Upload
                    </button>
                    <button id="cancelBtn" type="button" class="ml-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded" onclick="closeModal()">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
