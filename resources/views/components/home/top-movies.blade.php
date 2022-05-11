<div class="container mx-auto">
    <h2 class="py-4 text-3xl font-bold text-zinc-900">Top Movies</h2>
    <div class="w-full flex flex-wrap">
        @for($i = 0; $i < 5; ++$i)
            <div class="w-1/5 pr-4">
                <x-movie-thumbnail />
            </div>
        @endfor
    </div>
</div>