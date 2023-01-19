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
                    <th>ID</th>
                    <th>ユーザー名</th>
                    <th>募集パート</th>
                    <th>納期</th>
                    <th>コメント</th>
                    <th style="width: 350px;">サンプル音源</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('posts.show', $post->id) }}">{{ $post->id }}</a></td>
                    <td><a class="link link-hover text-info" href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->section_part }}</td>
                    <td>{{ $post->deadline_at }}</td>
                    <td class="w-1 truncate">{{ $post->content }}</td>
                    <td>
                        <audio controls controlslist="nodownload" preload="metadata" src="{{ asset('storage/'. $post->music_file) }}"></audio>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- 投稿作成ページへのリンク<a class="btn btn-primary" href="{{ route('posts.create') }}">新規募集</a> --}}
    

@endsection