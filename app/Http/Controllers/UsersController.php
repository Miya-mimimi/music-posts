<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    public function edit($id)
    {
       
        $user = User::findOrFail($id);
        
       
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
        ]);
        
        // idの値で投稿を検索して取得
        $user = User::findOrFail($id);
        
        //　投稿を更新
        $user->name = $request->name;
        $user->twitter_account = $request->twitter_account;
        $user->discord_account = $request->discord_account;
        $user->self_introduction = $request->self_introduction;
        $user->save();
        
        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }
}
