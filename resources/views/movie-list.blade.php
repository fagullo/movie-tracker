<x-guest-layout>
    <div class="container mx-auto py-12 px-4 md:px-0">
        <div class="flex flex-wrap gap-0 md:gap-8">
            @for($i = 0; $i < 20; ++$i)
                <div class="w-1/2 md:w-1/12 px-1 md:px-0 mb-2 md:mb-0">
                    <x-movie-thumbnail />
                </div>
            @endfor
        </div>
        <div class="my-8 w-full flex items-center justify-center">
            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between gap-8">
                {{-- Previous Page Link --}}
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>

                {{-- Next Page Link --}}
                <a href="#" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            </nav>
        </div>
    </div>
</x-guest-layout>
