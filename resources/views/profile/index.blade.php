<x-app-layout>
    <div class="mt-5">
        <div class="flex flex-col mt-5 gap-y-3">
            <x-form.p label="氏名" :value="$user->full_name" />
            <x-form.p label="メールアドレス" :value="$user->email" />
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-5">
            @csrf
            <button type="submit" class="btn bg-red-500 text-white w-56 p-3"><i class="las la-sign-out-alt la-lg mr-1"></i>ログアウト</button>
        </form>
    </div>
    <!-- プロフィール画像変更モーダル -->
    <x-profile.profile-image-update-modal />
</x-app-layout>
@vite(['resources/js/profile/profile.js', 'resources/sass/profile/profile.scss'])