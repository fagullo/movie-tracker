<div class="container mx-auto px-2 md:px-0">
    <h2 class="py-4 text-3xl font-bold text-zinc-900">Top Movies</h2>
    <div class="w-full flex flex-col md:flex-row flex-wrap">
        @for($i = 0; $i < 5; ++$i)
            <div class="w-full md:w-1/5 pr-0 md:pr-4 mb-4 md:mb-0">
                <x-movie-card />
            </div>
        @endfor
    </div>
</div>