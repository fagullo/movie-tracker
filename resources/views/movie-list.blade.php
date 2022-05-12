<x-guest-layout>
    <div class="container mx-auto py-12 px-4 md:px-0">
        <div class="flex flex-wrap gap-0 md:gap-8">
            @foreach($movies as $movie)
                <div class="w-1/2 md:w-1/12 px-1 md:px-0 mb-2 md:mb-0">
                    <x-movie-thumbnail :movie="$movie"/>
                </div>
            @endforeach
        </div>
        <div class="my-8 w-full flex flex-col items-center justify-center">
            {{ $movies->links() }}
        </div>
    </div>
</x-guest-layout>
