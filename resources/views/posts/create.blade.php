@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>新規募集の作成</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.store') }}" class="w-1/2">
            @csrf
                
                <div class="form-control my-4">
                    <label for="section_part" class="label">
                        <span class="label-text">募集パート:</span>
                    </label>
                    <select name="section_part" class="input input-bordered w-full">
                        <option value="ギター">ギター</option>
                        <option value="ベース">ベース</option>
                        <option value="ドラム">ドラム</option>
                    </select>
                </div>
                
                <div class="form-control my-4">
                    <label for="deadline_at" class="label">
                        <span class="label-text">納期:</span>
                    </label>
                    <input type="date" name="deadline_at" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="" class="label">
                        <span class="label-text">サンプル音源:</span>
                    </label>
                    <input type="text" name="" placeholder="サンプル音源を貼り付けてください" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">コメント:</span>
                    </label>
                    <input type="textarea" name="content" placeholder="曲の雰囲気や募集の要望を入力してください" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">投稿</button>
        </form>
    </div>
@endsection