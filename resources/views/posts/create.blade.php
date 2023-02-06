@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>新規募集の作成</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
                
                <div class="form-control my-4">
                    <label for="section_part" class="label">
                        <span class="label-text">募集パート:</span>
                    </label>
                    <select name="section_part" class="input input-bordered w-full">
                        <option value="ギター" @if (old('section_part') == "ギター") selected @endif>ギター</option>
                        <option value="ベース" @if (old('section_part') == "ベース") selected @endif>ベース</option>
                        <option value="ドラム" @if (old('section_part') == "ドラム") selected @endif>ドラム</option>
                        <option value="その他" @if (old('section_part') == "その他") selected @endif>その他</option>
                    </select>
                </div>
                
                <div class="form-control my-4">
                    <label for="deadline_at" class="label">
                        <span class="label-text">納期:</span>
                    </label>
                    <input type="date" name="deadline_at" value="{{ old('deadline_at') }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="music_file" class="label">
                        <span class="label-text">サンプル音源(8Mまで):</span>
                    </label>
                    <input type="file" name="music_file" accept="audio/*">
                </div>
                
                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">コメント:</span>
                    </label>
                    <textarea name="content" wrap="hard" placeholder="曲の雰囲気や募集の要望を入力してください。募集パートでその他を選択した場合、具体的に募集パートを記載してください" 
                             class="input input-bordered h-48 w-full" >{{ old('content') }}</textarea>
                </div>

            <button type="submit" class="btn btn-primary btn-outline">投稿</button>
        </form>
    </div>
@endsection