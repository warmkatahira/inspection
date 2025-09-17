<div class="disable_scrollbar flex flex-grow overflow-scroll">
    <div class="item_list bg-white overflow-x-auto overflow-y-auto border border-gray-600">
        <table class="text-xs">
            <thead>
                <tr class="text-left text-white bg-black whitespace-nowrap sticky top-0">
                    <th class="font-thin py-1 px-2 text-center">操作</th>
                    <th class="font-thin py-1 px-2 text-center">商品JANコード</th>
                    <th class="font-thin py-1 px-2 text-center">商品名</th>
                    <th class="font-thin py-1 px-2 text-center">理論在庫数</th>
                    <th class="font-thin py-1 px-2 text-center">検品数量</th>
                    <th class="font-thin py-1 px-2 text-center">検品ステータス</th>
                    <th class="font-thin py-1 px-2 text-center">検品実施日時</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($items as $item)
                    <tr class="text-left cursor-default whitespace-nowrap @if($item->is_completed) bg-teal-100 @endif">
                        <td class="py-1 px-2 border">
                            <div class="flex flex-row gap-5">
                                <button type="button" class="btn inspection_quantity_reset_enter bg-btn-cancel text-white py-1 px-2" data-item-no="{{ $item->item_no }}">検品数量リセット</button>
                            </div>
                        </td>
                        <td class="py-1 px-2 border">{{ $item->item_jan_code }}</td>
                        <td class="py-1 px-2 border">{{ $item->item_name }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($item->stock) }}</td>
                        <td class="py-1 px-2 border text-right">{{ number_format($item->inspection_quantity) }}</td>
                        <td class="py-1 px-2 border text-center">{{ $item->is_completed_text }}</td>
                        <td class="py-1 px-2 border">
                            @if(!is_null($item->inspected_at))
                                {{ CarbonImmutable::parse($item->inspected_at)->isoFormat('Y年MM月DD日(ddd) HH:mm:ss') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<form method="POST" action="{{ route('inspection_quantity_reset.reset') }}" id="inspection_quantity_reset_form" class="hidden">
    @csrf
    <input type="hidden" id="item_no" name="item_no">
</form>