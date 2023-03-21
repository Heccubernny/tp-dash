<div class="container mx-auto">
    <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
            <h1 class="text-xl font-bold text-gray-800 mr-4">{{$title}}</h1>
            <div class="mx-3">
                <button class="bg-[#27159F] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md" onclick="openModal()" id="addFormBtn">Add New</button>
                @if($title == 'Admin')
                @includeIf('components.modal.add-new-admin-modal')
                @else
                    @includeIf('components.modal.add-new-user-modal')

                    <a
                        href="{{ url($excel_export_route ?? '') }}"
                    >
                        <button class="bg-[#B7B7B7] hover:bg-blue-500 text-[#010446] hover:text-white font-bold py-2 px-4 rounded-md">Export
                            {{$title}} (Excel)</button>

                    </a>
                @endif


            </div>


        </div>
        <div class="flex items-center">
            <button class="bg-[#27159F] flex items-center hover:bg-gray-500 text-white font-bold py-2 px-5 rounded-md mr-4"><img src="{{asset('images/arrow_left_icon.png')}}" class="w-[0.85rem] h-[0.85rem] pr-1"> Filter</button>
            <!-- Add your filter modal button here -->

        </div>
    </div>
</div>

@push('scripts')
    <script>

    // Modal script goes here

    // // Function to close the modal


    const filterBtn = document.getElementById('addFormBtn');
    const filterModal = document.getElementById('addFormModal');
    const cancelBtn = document.getElementById('cancelBtn');

    function closeModal() {
    document.getElementById("addFormModal").classList.add("hidden");
    document.body.classList.remove("overflow-hidden");
    }


    filterBtn.addEventListener('click', () => {
    filterModal.classList.remove('hidden');
    });

    cancelBtn.addEventListener('click', () => {
    filterModal.classList.add('hidden');
    });

    // function to open the modal
    function openModal() {
    document.getElementById('addFormModal').classList.remove('hidden');
    }
    document.getElementById('cancelBtn').addEventListener('click', function() {
    document.getElementById('addFormModal').classList.add('hidden');
    });

    // var modal = document.getElementById("filterModal");
    // window.onclick = function(event) {
    // if (event.target !== modal) {
    // modal.style.display = "none";
    // }
    // }
    // function to get the modal

    </script>


@endpush
