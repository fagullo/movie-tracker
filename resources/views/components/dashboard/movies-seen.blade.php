<div>
    <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
        <div class="text-xl font-bold text-gray-700">Movies Seen</div>
        <div class="my-8 flex justify-between items-center">
            <h1 class="text-5xl font-bold text-gray-800">64,5%</h1>
            <div class="text-gray-500 flex gap-2">
                <x-increase value="2%" />
                <span>Compared to last week</span>
            </div>
        </div>
        <x-svg.random-donut-chart />
        <table class="mt-6 -mb-2 w-full text-gray-600">
            <tbody>
            <tr>
                <td class="py-2">Current week</td>
                <td class="text-gray-500">896</td>
                <td>
                    <x-svg.random-chart-xs-2 />
                </td>
            </tr>
            <tr>
                <td class="py-2">Last week</td>
                <td class="text-gray-500">1200</td>
                <td>
                    <x-svg.random-chart-xs-1 />
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>