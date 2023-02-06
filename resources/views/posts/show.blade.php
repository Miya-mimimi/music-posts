@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>投稿詳細</h2>
    </div>

    <table class="table w-1/2 my-4">
        
        <tr>
            <th>ユーザー名</th>
            <td>
                <a class="flex link link-hover text-info" Href="{{ route('users.show', $post->user->id) }}">
                    @if ($post->user->image == NULL)
                        <image style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" 
                            src="/kkrn_icon_user_3.png">
                        </image>
                    @else
                        <image style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" 
                            src="{{ asset('https://musicposts0125.s3.ap-northeast-1.amazonaws.com/'. $post->user->image) }}">
                        </image>
                    @endif
                    <div class="mt-3 ml-3">
                        {{ $post->user->name }}
                    </div>
                </a>
            </td>
        </tr>
        
        <tr>
            <th>募集パート</th>
            <td>{{ $post->section_part }}</td>
        </tr>
        
        <tr>
            <th>納期</th>
            <td>{{ $post->deadline_at }}</td>
        </tr>
        
        <tr>
            <th>サンプル音源</th>
            <td>
                <audio controls controlslist="nodownload" preload="metadata" src="{{ asset('https://musicposts0125.s3.ap-northeast-1.amazonaws.com/'. $post->music_file) }}"></audio>
            </td>
        </tr>
        
        <tr>
            <th>コメント</th>
            <td style="white-space: pre-wrap;">{{ $post->content }}</td>
        </tr>
    </table>
    
    <div>
        @if (Auth::id() == $post->user_id)
        
            {{-- 投稿編集ページへのリンク --}}
            <a class="btn btn-outline" href="{{ route('posts.edit', $post->id) }}">この投稿を編集</a>
            
            {{-- 登録削除フォーム --}}
            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="my-2">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-error btn-outline" 
                    onclick="return confirm('id = {{ $post->id }} の投稿を削除します。よろしいですか？')">削除</button>
            </form>
        @endif
        
    </div>

@endsection