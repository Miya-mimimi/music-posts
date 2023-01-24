<div class="prose ml-4">
    <h2>プロフィール</h2>
</div>

<table class="table w-full my-4">
        
    <tr>
        <th>ユーザー名</th>
        <td>{{ $user->name }}</td>
    </tr>
        
    <tr>
        <th>Twitterリンク</th>
        <td><a href="{{ $user->twitter_account }}">{{ $user->twitter_account }}</a></td>
    </tr>
        
    <tr>
        <th>Discordアカウント</th>
        <td>{{ $user->discord_account }}</td>
    </tr>
        
    <tr>
        <th>自己紹介</th>
        <td>{{ $user->self_introduction }}</td>
    </tr>
</table>
@if (Auth::id() == $user->id)
    {{-- プロフィール編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('users.edit', $user->id) }}">プロフィールを編集</a>
@endif