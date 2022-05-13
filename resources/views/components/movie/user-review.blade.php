@props(['is_liked', 'is_viewed'])
<div class="col-span-2 flex flex-col gap-6 md:gap-0 md:flex-row justify-around">
    <div class="cursor-pointer flex flex-col items-center justify-center text-xl font-semibold">
        <div class="mb-4">{{ $is_viewed ? 'You saw this movie' : 'You haven\'t seen this movie yet' }}</div>
        <x-svg.eye class="w-24 {{ $is_viewed ? 'text-gold-500' : 'text-gray-500' }}" />
    </div>
    <div class="cursor-pointer flex flex-col items-center justify-center text-xl font-semibold">
        <div class="mb-4">{{ $is_liked ? 'You like this movie' : 'You don\'t like this movie yet' }}</div>
        <div class="flex justify-center gap-4">
            <x-svg.like class="w-24 {{ $is_liked ? 'text-green-500' : 'text-gray-500' }}" />
        </div>
    </div>
</div>