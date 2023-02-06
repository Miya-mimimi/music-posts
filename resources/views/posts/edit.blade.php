@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>投稿編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
            @method('PUT')
                
                <div class="form-control my-4">
                    <label for="section_part" class="label">
                        <span class="label-text">募集パート:</span>
                    </label>
                    <select name="section_part" class="input input-bordered w-full">
                        <option value="ギター" @if (old('section_part', $post->section_part) == "ギター") selected @endif>ギター</option>
                        <option value="ベース" @if (old('section_part', $post->section_part) == "ベース") selected @endif>ベース</option>
                        <option value="ドラム" @if (old('section_part', $post->section_part) == "ドラム") selected @endif>ドラム</option>
                        <option value="その他" @if (old('section_part', $post->section_part) == "その他") selected @endif>その他</option>
                    </select>
                </div>
                
                <div class="form-control my-4">
                    <label for="deadline_at" class="label">
                        <span class="label-text">納期:</span>
                    </label>
                    <input type="date" name="deadline_at" value="{{ old('deadline_at', $post->deadline_at) }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="music_file" class="label">
                        <span class="label-text">サンプル音源:(8Mまで。ファイルの更新がある場合は再度アップロードしてください。)</span>
                    </label>
                    <input type="file" name="music_file" accept="audio/*">
                    <div class="mt-3" style="font-size: 14px;">
                        現在のサンプル音源:
                    <audio controls controlslist="nodownload" preload="metadata" src="{{ asset('https://musicposts0125.s3.ap-northeast-1.amazonaws.com/'. $post->music_file) }}" class="mt-3"></audio>
                    </div>
                </div>
                
                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">コメント:</span>
                    </label>
                    <textarea name="content" placeholder="曲の雰囲気や募集の要望を入力してください。募集パートでその他を選択した場合、具体的に募集パートを記載してください" 
                    class="input input-bordered h-48 w-full">{{ old('content', $post->content) }}</textarea>
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection