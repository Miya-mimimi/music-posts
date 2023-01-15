@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>投稿詳細</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>ID</th>
            <td>{{ $post->id }}</td>
        </tr>
        
        <tr>
            <th>ユーザー名</th>
            <td></td>
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
            <td></td>
        </tr>
        
        <tr>
            <th>メッセージ</th>
            <td>{{ $post->content }}</td>
        </tr>
    </table>
    
    {{-- 投稿編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('posts.edit', $post->id) }}">この投稿を編集</a>
    
    {{-- 登録削除フォーム --}}
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $post->id }} の投稿を削除します。よろしいですか？')">削除</button>
    </form>

@endsection