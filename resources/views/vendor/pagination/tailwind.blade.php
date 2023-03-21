@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-row justify-between pagination">
        {{-- Showing 1 to 5 of 26 results --}}

        <div class="flex items-center justify-center align-center">
            <div>
                <p class="text-sm text-[#4169E1] leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium text-[#000000]">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium text-[#000000]">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium text-[#000000]">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>

        {{-- previous and next button --}}
    <div>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span><a class="pagination-previous relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 rounded-md hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 text-[#152147]" disabled>Previous</a></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#4169E1] leading-5 rounded-md hover:text-gray-500
            focus:outline-none active:text-gray-700 transition
            ease-in-out duration-150">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
{{--            @if (is_string($element))--}}
{{--                <span><a href="{{ $paginator->previousPageUrl() }}" class="pagination-ellipsis element-biy">{{ $element }}</a></span>--}}
{{--            @endif--}}

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span><a class="pagination-link is-current relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#4169E1] cursor-default leading-5">{{ $page }}</a></span>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2 ) || ($paginator->currentPage() == 1 && $page <= 3) || ($paginator->currentPage() == $paginator->lastPage() && $page >= $paginator->lastPage() - 2 ))
                        <span><a href="{{ $url }}" class="pagination-link relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#152147] leading-5 hover:text-gray-500 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a></span>

                    @elseif (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 2) && $paginator->currentPage() != 2 && $paginator->currentPage() != $paginator->lastPage() - 1 || $page == $paginator->lastPage())
                        @if (!isset($moreThanThree))
                            <span><a href="{{ $paginator->previousPageUrl() }}" class="pagination-ellipsis relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#152147] leading-5 hover:text-gray-500 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">&hellip;</a></span>


                                <?php $moreThanThree = true; ?>


                        @endif

                    @endif

                @endforeach
            @endif

        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <span><a href="{{ $paginator->nextPageUrl() }}" class="pagination-next relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-[#4169E1] leading-5 rounded-md hover:text-gray-500 focus:outline-none  transition ease-in-out duration-150">Next</a></span>
        @else
            <span><a class="pagination-next relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#152147] leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" disabled>Next</a></span>
        @endif

    </div>

    </nav>
    <nav class="pagination">
        <ul class="pagination-list">


    </ul>
    </nav>
@endif

{{--end testing--}}

