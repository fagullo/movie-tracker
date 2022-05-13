@props(['likes'])
<div>
    <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
        <h5 class="text-xl text-gray-700">Movies Liked</h5>
        <div class="my-8 flex justify-between items-center gap-12">
            <h1 class="text-5xl font-bold text-gray-800">{{ $likes['total'] }}</h1>
            <div class="text-gray-500 flex gap-2">
                <x-increase value="{{ $likes['rate'] }}%" />
                <span>Compared to last week</span>
            </div>
        </div>
        <x-svg.random-chart-lg />
        <table class="mt-6 -mb-2 w-full text-gray-600">
            <tbody>
            <tr>
                <td class="py-2">Current week</td>
                <td class="text-gray-500">{{ $likes['current_week'] }}</td>
                <td>
                    <x-svg.random-chart-xs-2 />
                </td>
            </tr>
            <tr>
                <td class="py-2">Last week</td>
                <td class="text-gray-500">{{ $likes['last_week'] }}</td>
                <td>
                    <x-svg.random-chart-xs-1 />
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>