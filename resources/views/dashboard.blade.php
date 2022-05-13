<x-app-layout>
    <div class="container mx-auto py-12 grow flex items-center">
        <div class="w-full flex gap-6 items-center justify-center">
            <x-dashboard.movies-seen :views="$views" />
            <x-dashboard.trending-card :likes="$likes" />
        </div>
    </div>
</x-app-layout>
