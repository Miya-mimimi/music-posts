@if (Auth::check())
    {{-- 新規投稿のリンク --}}
    <li><a class="link link-hover" href="{{ route('posts.create') }}">新規投稿</a></li>
    {{-- マイページへのリンク --}}
    <li><a class="link link-hover" href="#">プロフィール</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">会員登録</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
@endif