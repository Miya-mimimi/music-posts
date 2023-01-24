@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>プロフィールの編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
            @method('PUT')
                
                <div class="form-control my-4">
                    <label for="image" class="label">
                        <span class="label-text">プロフィール画像:</span>
                    </label>
                    <input type="file" name="image" accept="image/*" value="{{ $user->image }}" >
                </div>
                
                <div class="form-control my-4">
                    <label for="name" class="label">
                        <span class="label-text">名前:</span>
                    </label>
                    <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="twitter_account" class="label">
                        <span class="label-text">Twitterアカウント:</span>
                    </label>
                    <input type="text" name="twitter_account" value="{{ $user->twitter_account }}" placeholder="Twitterアカウントを入力してください" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="discord_account" class="label">
                        <span class="label-text">Discordアカウント:</span>
                    </label>
                    <input type="text" name="discord_account" value="{{ $user->discord_account }}" placeholder="Discordアカウントを入力してください" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="self_introduction" class="label">
                        <span class="label-text">自己紹介:</span>
                    </label>
                    <textarea name="self_introduction" placeholder="あなたのことを教えてください！" value="{{ $user->self_introduction }}" 
                           class="input input-bordered h-48 w-full"></textarea>
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection