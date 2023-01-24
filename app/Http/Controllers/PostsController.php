<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if (\Auth::check()) {   
            // categoryで選択された値を$keywordに格納
            $keyword = $request->input('keyword');
                
            if ($keyword == null) {
                $posts = Post::all();
                return view('posts.index', ['posts' => $posts]);
            }
                
            $query = Post::query();
                
            $query->where('section_part', "{$keyword}");
                
            $posts = $query->get();
            return view('posts.index', compact('posts', 'keyword'));
        } else {
            return view('/dashboard');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        
        // 投稿作成ビューを表示
        return view('posts.create', [
            'post' => $post,
        ]);
        
        return redirect('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'deadline_at' => 'required',
            'music_file' => 'required',
            'content' => 'required|max:255',
        ]);
        
        $file = $request->file('music_file');
        if ($request->hasFile('music_file')) {
            $path = \Storage::put('/public', $file);
            $music_file = explode('/', $path)[1];
        } else {
            $music_file = null;
        }
        
        
        
        // 認証済みユーザの投稿を作成
        $request->user()->posts()->create([
            'section_part' => $request->section_part,
            'deadline_at' => $request->deadline_at,
            'music_file' => $music_file,
            'content' => $request->content,
        ]);
        
        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値で投稿を検索して取得
        $post = Post::findOrFail($id);
            
        return view('posts.show', [
            'post' => $post,
        ]);
            
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値で投稿を検索して取得
        $post = Post::findOrFail($id);
        
        if (\Auth::id() === $post->user_id) {
            return view('posts.edit', [
                'post' => $post,
            ]);
        }
        else {
            return redirect('/dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'deadline_at' => 'required',
            'music_file' => 'required',
            'content' => 'required|max:255',
        ]);
        
        // idの値で投稿を検索して取得
        $post = Post::findOrFail($id);
        
        $file = $request->file('music_file');
        if ($request->hasFile('music_file')) {
            $path = \Storage::put('/public', $file);
            $music_file = explode('/', $path)[1];
        } else {
            $music_file = null;
        }
        
        if (\Auth::id() === $post->user_id) {
            //　投稿を更新
            $post->section_part = $request->section_part;
            $post->deadline_at = $request->deadline_at;
            $post->music_file = $music_file;
            $post->content = $request->content;
            $post->save();
        }
        
        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Models\Post::findOrFail($id);
        
        // 認証済みユーザがその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $post->user_id) {
            $post->delete();
            return redirect('/dashboard')->with('success','Delete Successful');
        }
        
        // トップページへリダイレクトさせる
        return redirect('/dashboard');
    }
}
