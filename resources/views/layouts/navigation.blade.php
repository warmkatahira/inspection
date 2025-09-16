<div id="navigation-bar">
    <!-- ダッシュボード -->
    <div class="navigation-btn">
        <a class="btn tippy_dashboard" href="{{ route('dashboard.index') }}"><i class="las la-home"></i></a>
    </div>
    <!-- 商品 -->
    <div class="navigation-btn">
        <a class="btn tippy_item" href="{{ route('item_menu.index') }}"><i class="las la-tshirt"></i></a>
    </div>
    <!-- 検品 -->
    <div class="navigation-btn">
        <a class="btn tippy_inspection" href="{{ route('inspection_menu.index') }}"><i class="las la-barcode"></i></a>
    </div>
    <!-- プロフィール -->
    <div class="navigation-btn">
        <a class="btn tippy_profile" href="{{ route('profile.index') }}"><img id="profile" class="profile_image_navigation" src="{{ asset('storage/profile_images/' . Auth::user()->profile_image_file_name) }}"></a>
    </div>
</div>