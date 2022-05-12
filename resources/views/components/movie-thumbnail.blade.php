@props(['movie'])
<a href="{{ route('movie-details', 1) }}">
    <img class="w-full"
         src="{{ $movie->image }}"
         alt="">
</a>