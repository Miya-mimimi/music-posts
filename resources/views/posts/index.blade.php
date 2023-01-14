@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>募集一覧</h2>
    </div>
    
    @if (isset($posts))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ユーザー名</th>
                    <th>募集パート</th>
                    <th>納期</th>
                    <th style="width:300px;">コメント</th>
                    <th>サンプル音源</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('posts.show', $post->id) }}">{{ $post->id }}</a></td>
                    <td>{{-- $post->name --}}</td>
                    <td>{{ $post->section_part }}</td>
                    <td>{{ $post->deadline_at }}</td>
                    <td class="text-ellipsis">{{ $post->content }}</td>
                    <td>{{-- $post->music_file --}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- 投稿作成ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('posts.create') }}">新規募集</a>

@endsection