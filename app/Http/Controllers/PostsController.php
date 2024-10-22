<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // 一覧表示
    public function index()
    {
         $user = auth()->user();

        //  $followingIds = $user->following ? $user->following->pluck('followed_id')->toArray() : [];

         $posts = Post::with('user')
         ->whereIn('user_id', array_merge([$user->id], $followingIds))
          ->orderBy('created_at', 'desc')
          ->get();

          return view('posts.index', compact('posts', 'user'));
    }

    // 新規ポスト入力
     public function create()
     {
        // 後で
     }

    // 新規ポスト処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'newPost' => 'required|string|max:150',
        ]);

        // 新しい投稿を作成
        $post = new Post();
        $post->post = $validated['newPost'];
        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('posts.index')->with('success', '投稿が完了しました！');
    }

    // 編集
    public function update(Request $request, $id)
    {
        // バリデーション（150文字まで）
        $validated = $request->validate([
            'post' => 'required|string|max:150',
        ]);

        // 投稿を取得
        $post = Post::find($id);

        // 投稿が見つからない場合の処理
        if (!$post) {
            return redirect()->route('posts.index')->with('error', '投稿が見つかりません')->setStatusCode(404);
        }

        // 自分の投稿のみ編集できるようにする
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index')->with('error', '権限がありません')->setStatusCode(403);
        }

        // 投稿内容を更新
        $post->post = $validated['post'];
        $post->save();

        // TOPページにリダイレクト
        return redirect()->route('posts.index')->with('success', '投稿が更新されました！');
    }

    // 削除
    public function destroy($id)
    {

    // 投稿を取得
    $post = Post::find($id);

    // 投稿が見つからない場合の処理
    if (!$post) {
        return redirect()->route('posts.index')->with('error', '投稿が見つかりません')->setStatusCode(404);
    }

    // 自分の投稿のみ削除できるようにする
    if ($post->user_id !== auth()->id()) {
        return redirect()->route('posts.index')->with('error', '権限がありません')->setStatusCode(403);
    }

    // 投稿を削除
    $post->delete();

    // TOPページにリダイレクト
    return redirect()->route('posts.index')->with('success', '投稿が削除されました！');
}

}
