import start_loading from '../../loading';

// リセットボタンを押下した場合
$('.inspection_quantity_reset_enter').on("click",function(){
    // 処理を実行するか確認
    const result = window.confirm("検品数量のリセットを実行しますか？");
    // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
    if(result === true){
        start_loading();
        // リセット対象の商品IDを要素にセット
        $('#item_no').val($(this).data('item-no'));
        $("#inspection_quantity_reset_form").submit();
    }
});