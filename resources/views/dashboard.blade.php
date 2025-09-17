<x-app-layout>
    <div class="flex flex-col gap-3 mt-5 text-lg">
        <x-dashboard.info-div label="商品数" :value="$item_count" />
        <x-dashboard.info-div label="検品実施済商品数" :value="$inspection_complete_count" />
        <x-dashboard.info-div label="本日検品実施済商品数" :value="$today_inspection_complete_count" />
        <div class="flex flex-row items-center">
            <p class="bg-theme-main text-white py-3 w-60 pl-3">検品進捗率</p>
            <p class="bg-white py-3 w-32 text-right pr-2">{{ number_format($progress_rate, 1) }}<i class="las la-percent ml-1 la-sm"></i></p>
        </div>
        <x-dashboard.info-div label="合計検品数量" :value="$total_inspection_quantity" />
    </div>
</x-app-layout>