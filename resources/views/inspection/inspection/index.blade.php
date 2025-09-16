<x-app-layout>
    <button type="button" id="complete_enter" class="btn text-lg bg-btn-enter text-white py-3 px-10 mt-3">検品完了</button>
    <div class="mt-5 flex flex-row gap-5 items-start text-base">
        <div class="flex flex-col w-3/12">
            <div class="flex flex-col mb-2 w-full">
                <p class="py-2 bg-black text-white pl-2 text-center">商品識別コード</p>
                <input type="tel" id="item_id_code" name="item_id_code" class="h-24" autocomplete="off">
            </div>
        </div>
        <div class="flex flex-col w-2/12">
            <div class="py-2 bg-black text-white text-center">検品数量</div>
            <div id="inspection_quantity" class="text-5xl px-10 pt-5 h-24 bg-white border border-black text-center"></div>
        </div>
        <div class="flex flex-col w-2/12">
            <div class="py-2 bg-black text-white text-center">理論在庫数</div>
            <div id="stock" class="text-5xl px-10 pt-5 h-24 bg-white border border-black text-center"></div>
        </div>
        <div class="flex flex-col w-5/12">
            <div class="py-2 bg-black text-white text-center">メッセージ</div>
            <div id="message" class="px-10 pt-5 h-24 bg-white border border-black text-lg"></div>
        </div>
    </div>
    <form method="POST" action="{{ route('inspection.complete') }}" class="m-0" id="complete_form">
        @csrf
    </form>
    <input type="hidden" id="end" value="{{ session('end') }}">
</x-app-layout>
@vite(['resources/js/inspection/inspection/inspection.js'])