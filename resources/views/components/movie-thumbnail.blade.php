@props(['movie'])
<a href="{{ route('movie-details', $movie->id) }}">
    <img class="w-full"
         src="{{ $movie->image }}"
         alt="">
</a>