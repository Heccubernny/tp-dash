<thead class="mt-48">
    <tr>
        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            #
        </th> --}}
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Photo
        </th>
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            User Name
        </th>
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Mobile
        </th>
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Email
        </th>
{{--        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">--}}
{{--                    Status--}}
{{--                </th>--}}
        @if(!$title == 'Admin')
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Status
        </th>
        @else
            <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
                Role
            </th>
        @endif
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Operation
        </th>
        <th scope="col" class="px-6 py-3 text-left text-[14px] font-medium text-gray-500 tracking-wider">
            Action
        </th>
    </tr>
</thead>
