<x-guest-layout>
    <div class="flex flex-col gap-8 py-12">
        <x-home.movies-grid title="Top Movies" :movies="$top"></x-home.movies-grid>
        <x-home.movies-grid title="Trending Movies" :movies="$trending"></x-home.movies-grid>
    </div>
</x-guest-layout>
