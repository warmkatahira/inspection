<x-guest-layout>
    <!-- バリデーションエラー -->
    <x-validation-error-msg />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- ユーザーID -->
        @if(config('app.env') === 'local')
            <x-auth.input id="user_id" label="ユーザーID" type="text" db="katahira" />
        @else
            <x-auth.input id="user_id" label="ユーザーID" type="text" :db="null" />
        @endif
        <!-- パスワード -->
        @if(config('app.env') === 'local')
            <x-auth.input id="password" label="パスワード" type="password" db="katahira134" />
        @else
            <x-auth.input id="password" label="パスワード" type="password" :db="null" />
        @endif
        <div class="flex mt-4">
            <button type="submit" class="btn bg-black text-white text-center rounded-lg py-5 w-full text-lg">ログイン</button>
        </div>
    </form>
</x-guest-layout>