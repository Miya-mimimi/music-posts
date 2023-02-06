<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Storage;

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
            'name' => 'required|max:15',
        ]);
        if (\Auth::id()) {
            $user = User::findOrFail($id);
            
            $image_file = $request->file('image');
            if ($request->hasFile('image')) {
                $image_path = \Storage::disk('s3')->putFile('/public', $image_file, 'public');
                $user->image = $image_path;
            } 
            
            
            $user->name = $request->name;
            $user->twitter_account = $request->twitter_account;
            $user->discord_account = $request->discord_account;
            $user->self_introduction = $request->self_introduction;
            $user->save();
            
            // トップページへリダイレクトさせる
            return redirect('/dashboard');
        }
    }
}
