@props(['movie'])
<div class="card bg-zinc-900 h-full rounded-xl p-6 space-y-4 text-white flex flex-col justify-between">
    <a href="{{ route('movie-details', $movie->id) }}">
        <img class="w-full rounded-md transition hover:bg-cyan-300"
             src="{{ $movie->image }}"
             alt="">
    </a>
    <div class="text-gold-200 font-semibold text-xl transition hover:text-cyan-300">
        {{ $movie->title }}
    </div>
    <p class="text-sm select-none">{{ $movie->crew }}</p>
    <div class="flex items-center justify-between font-semibold text-sm">
        <span class="text-gold-500 flex justify-between items-center">
            <x-svg.eye class="h-4 w-4 mr-1 text-gold-500" />
            {{ $movie->views()->count() }}
        </span>
        <span class="text-gold-500 flex justify-between items-center select-none">
            <x-svg.like class="h-4 w-4 mr-1 text-gold-500" />
            {{ $movie->likes()->count() }}
        </span>
    </div>
</div>