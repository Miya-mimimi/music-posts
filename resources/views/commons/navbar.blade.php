<header class="mb-4">
    <nav class="navbar bg-teal-300 text-neutral-content">
        {{-- トップページへのリンク --}}
        <div class="flex-1">
            <h1><a class="btn btn-ghost normal-case text-xl" href="/dashboard">クリエイターマッチング</a></h1>
            <form method="GET" action="{{ route('posts.index') }}" class="flex w-1/4">
                @csrf
                
                <select name="keyword" class="text-black input input-bordered ml-2 w-full">
                    <option value="">すべての募集</option>
                    <option value="ギター">ギター</option>
                    <option value="ベース">ベース</option>
                    <option value="ドラム">ドラム</option>
                    <option value="その他">その他</option>
                </select>
                
                <button type="submit" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
                </button>
            </from>
        </div>
        
        <div class="flex-none">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <ul tabindex="0" class="menu hidden lg:menu-horizontal">
                    @include('commons.link_items')
                </ul>
                <div class="dropdown dropdown-end">
                    <button type="button" tabindex="0" class="btn btn-ghost normal-case font-normal lg:hidden">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Guest
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52 text-info">
                        @include('commons.link_items')
                    </ul>
                </div>
            </form>
        </div>
    </nav>
</header>