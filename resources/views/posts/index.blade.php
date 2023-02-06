@extends('layouts.app')

@section('content')
<style>
    .table-zebra tbody tr:nth-child(even) th,
    .table-zebra tbody tr:nth-child(even) td {
            background-color: #F0FFF0;
    .width: 100%;
    }
</style>

    <div class="prose ml-4">
        <h2>募集一覧</h2>
    </div>
    
    @if (isset($posts))
        <table class="table table-fixed table-zebra w-full my-4">
            <thead>
                <tr>
                    
                    <th>ユーザー</th>
                    <th>募集パート</th>
                    <th>納期</th>
                    <th>コメント</th>
                    <th></th>
                    <th style="width: 350px;">サンプル音源</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <a class="flex link link-hover text-info" href="{{ route('users.show', $post->user->id) }}">
                            @if ($post->user->image == NULL)
                                <image style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" 
                                    src="/kkrn_icon_user_3.png">
                                </image>
                            @else
                                <image style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" 
                                    src="{{ asset('https://musicposts0125.s3.ap-northeast-1.amazonaws.com/'. $post->user->image) }}">
                                </image>
                            @endif
                            <div class="text-left ml-2 mt-3 truncate">{{ $post->user->name }}</div>
                        </a>
                    </td>
                    <td>{{ $post->section_part }}</td>
                    <td>{{ $post->deadline_at }}</td>
                    <td class="w-1 truncate">{{ $post->content }}</td>
                    <td>
                        <a class="link link-hover text-info" href="{{ route('posts.show', $post->id) }}">詳細</a>
                    </td>
                    <td>
                        <audio controls controlslist="nodownload" preload="metadata" src="{{ asset('https://musicposts0125.s3.ap-northeast-1.amazonaws.com/'. $post->music_file) }}"></audio>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- 投稿作成ページへのリンク<a class="btn btn-primary" href="{{ route('posts.create') }}">新規募集</a> --}}
    

@endsection