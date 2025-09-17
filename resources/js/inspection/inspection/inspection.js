import audio_play from '../../audio';
import start_loading from '../../loading';

// 画面読み込み時の処理
$(document).ready(function() {
    // 商品識別コードにフォーカス
    $('#item_id_code').focus();
    // 検品完了後であれば
    if($('#end').val()){
        audio_play('end');
    }
});

// 商品識別コードが変更されたら
$('#item_id_code').on("change",function(){
    // 商品識別コードに値がある場合のみ処理する
    if($('#item_id_code').val()){
        const ajax_url = '/inspection/ajax_check_item_id_code';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ajax_url,
            type: 'GET',
            data: {
                item_id_code: $('#item_id_code').val(),
            },
            dataType: 'json',
            success: function(data){
                try {
                    // エラーがある場合
                    if(data['error_message']) {
                        // エラーを返す
                        throw new Error(data['error_message']);
                    }
                    // 検品数量を更新
                    $('#inspection_quantity').html(data['inspection_quantity']);
                    // 検品数量が1の場合
                    if(data['inspection_quantity'] == 1){
                        // 理論在庫数を更新
                        $('#stock').html(data['stock']);
                        // 商品名を表示
                        $('#item_name').html(data['item_name']);
                    }
                    // 検品OK時の処理
                    inspection_ok(data);
                } catch (e) {
                    // 検品NG時の処理
                    inspection_ng(e.message);
                }
            },
            error: function(){
                alert('失敗');
            }
        });
    }
});

// 検品OK時の処理
function inspection_ok(data){
    // 音声を再生
    // 検品数量が1の場合
    if(data['inspection_quantity'] == 1){
        audio_play('start');
    }else{
        audio_play('proc');
    }
    // メッセージをクリア
    $('#message').html(null);
    // Nullにして、フォーカスをセット
    $('#item_id_code').val(null);
    $('#item_id_code').focus();
}

// 検品NG時の処理
function inspection_ng(message){
    // 音声を再生
    audio_play('ng');
    // エラーをメッセージに出力
    $('#message').html(message);
    // Nullにして、フォーカスをセット
    $('#item_id_code').val(null);
    $('#item_id_code').focus();
}

// 検品完了ボタンを押下した場合
$('#complete_enter').on("click",function(){
    // 処理を実行するか確認
    const result = window.confirm("検品を完了しますか？");
    // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
    if(result === true){
        start_loading();
        $("#complete_form").submit();
    }
});