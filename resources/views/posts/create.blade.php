@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>新規募集の作成</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('posts.store') }}" class="w-1/2">
            @csrf
                
                <div class="form-control my-4">
                    <label for="" class="label">
                        <span class="label-text">募集パート:</span>
                    </label>
                    <select name="" class="input input-bordered w-full">
                        <option value="guitter">ギター</option>
                        <option value="bass">ベース</option>
                        <option value="drum">ドラム</option>
                    </select>
                </div>
                
                <div class="form-control my-4">
                    <label for="" class="label">
                        <span class="label-text">納期:</span>
                    </label>
                    <input type="text" name="" placeholder="希望の納期を入力してください" class="input input-bordered w-full">
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
                    <input type="text" name="content" placeholder="曲の雰囲気や募集の要望を入力してください" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">投稿</button>
        </form>
    </div>
@endsection