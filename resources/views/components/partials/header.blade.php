<div class="w-full bg-zinc-900">
    <div class="h-32 container mx-auto flex items-center text-white font-bold text-xl">
        <div class="grow grid gap-8 grid-cols-3">
            <ul class="flex gap-8 items-center">
                <li><a href="">Home</a></li>
                <li><a href="">Movie List</a></li>
            </ul>
            <div class="flex justify-center">
                <a href="{{ route('home') }}">
                    <x-svg.film class="h-12 text-gold-500"/>
                </a>
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</div>