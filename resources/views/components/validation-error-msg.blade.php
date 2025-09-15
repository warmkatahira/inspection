<!-- バリデーションエラー表示 -->
<div>
    @if($errors->all())
        <div class="bg-red-200 border border-red-500 text-red-700 pl-8 py-3 rounded mt-2">
            @foreach ($errors->all() as $error)
                <li class="text-sm text-red-700">{{ $error }}</li>
            @endforeach
        </div>
    @endif
</div>