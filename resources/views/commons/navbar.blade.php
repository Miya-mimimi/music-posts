<header class="mb-4">
    <nav class="navbar bg-neutral text-neutral-content">
        {{-- トップページへのリンク --}}
        <div class="flex-1">
            <h1><a class="btn btn-ghost normal-case text-xl" href="/">クリエイターマッチング</a></h1>
        </div>
        
        <div class="flex-none">
            <ul tabindex="0" class="menu lg:block lg:menu-horizontal">
                {{-- プロフィールへのリンク --}}
                <li><a class="link link-hover" href="#">プロフィール</a></li>
                {{-- 投稿作成ページへのリンク --}}
                <li><a class="link link-hover" href="{{ route('posts.create') }}">新規募集</a></li>
            </ul>
        </div>
    </nav>
</header>