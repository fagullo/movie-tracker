<x-guest-layout>
    <div class="container mx-auto py-12 grow px-4 md:px-0">
        <div class="flex flex-col md:grid grid-cols-2 gap-8">
            <div class="flex justify-center">
                <img class="object-contain"
                     src="{{ $movie->image }}"
                     alt="">
            </div>
            <div class="flex gap-8 flex-col">
                <x-movie.data key="Title" :value="$movie->full_title" />
                <x-movie.data key="Year" :value="$movie->year" />
                <x-movie.data key="IMDB Rating" value="{{ $movie->imdb_rating }} ({{ $movie->imdb_rating_count }})" />
                <x-movie.data key="Crew" :value="$movie->crew" />
                <x-movie.data key="Synopsis" :value="ucfirst($movie->synopsis)" />

                @if(Auth::check())
                    <x-movie.user-review :is_liked="$isLiked" :is_viewed="$isViewed" />
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
