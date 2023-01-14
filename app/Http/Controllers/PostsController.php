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
    public function index()
    {
        // 投稿の一覧を取得
        $posts = Post::all();
        
        // 投稿一覧ビューでそれを表示
        return view('posts.index', [
            'posts' => $posts,
        ]);
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
            'deadline_at' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        // 投稿を作成
        $post = new Post;
        $post->section_part = $request->section_part;
        $post->deadline_at = $request->deadline_at;
        $post->content = $request->content;
        $post->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
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
        
        // 投稿一覧ビューでそれを表示
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
        
        // 投稿編集ビューでそれを表示
        return view('posts.edit', [
            'post' => $post,
        ]);
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
            'deadline_at' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        // idの値で投稿を検索して取得
        $post = Post::findOrFail($id);
        
        //　投稿を更新
        $post->section_part = $request->section_part;
        $post->deadline_at = $request->deadline_at;
        $post->content = $request->content;
        $post->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
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
        $post = Post::findOrFail($id);
        
        // 投稿を削除
        $post->delete();
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
