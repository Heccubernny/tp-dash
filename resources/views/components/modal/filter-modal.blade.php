<!-- Filter modal -->
<div id="filterModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-medium mb-4">Filter Tasks</h2>
            <form action="{{ route('orders.status-count') }}" method="GET">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="location">Location</label>
                        {{-- <select name="location" id="location">
                            <option value="">Select a location</option>
                            @foreach ($locations as $location)
                            <option value="{{ $location }}"> {{ $location }}</option>
                        @endforeach
                        </select> --}}

                        <select name="location" id="location" class="form-select">
                            <option value="">Select a location</option>
                            @foreach ($locationsList as $location)
                                <option value="{{ $location->location }}">{{ $location->location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <div class="flex space-x-2">
                            <div>
                                <input type="checkbox" name="complete" id="completed" value="yes">
                                <label for="completed">Completed</label>
                            </div>
                            <div>
                                <input type="checkbox" name="decline" id="declined" value="yes">
                                <label for="declined">Declined</label>
                            </div>
                            <div>
                                <input type="checkbox" name="pending" id="pending" value="yes">
                                <label for="pending">Pending</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                    <button id="cancelBtn" type="button"
                            class="ml-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded"
                            onclick="closeModal()">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
