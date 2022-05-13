<div class="col-span-2 flex flex-col gap-6 md:gap-0 md:flex-row justify-around text-gold-500 font-bold">
    <div wire:click="view" class="cursor-pointer flex flex-col items-center justify-center">
        <button class="bg-zinc-900 py-2 px-4 rounded w-48">
            {{ $is_viewed ? 'Remove from viewed' : 'Add to viewed' }}
        </button>
    </div>
    <div wire:click="like" class="cursor-pointer flex flex-col items-center justify-center">
        <button class="bg-zinc-900 py-2 px-4 rounded w-48">
            {{ $is_liked ? 'Remove from liked' : 'Add to liked' }}
        </button>
    </div>
</div>