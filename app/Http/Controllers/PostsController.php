<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use Auth;

class PostsController extends Controller
{
    public function index(){
         $posts = Post::latest()->get();
         $users = User::get();
        //  array_multisort(array_map("strtotime", array_column($date,"date")),SORT_DESC,$date);
        return view('posts.index',['posts'=>$posts,'users'=>$users]);
    }

    public function post(Request $request)
    {

        // バリデーション
        $request->validate([
            'post' => 'required|min:1|max:150',
            ]);

        $post = $request->input('post');
        Post::create(['post' => $post,'user_id'=> Auth::id()]);
        return back();
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function update(Request $request)
    {
                // バリデーション
        $request->validate([
            'upPost' => 'required|min:1|max:150',
            ]);

        // 1つ目の処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        // 2つ目の処理
        post::where('id', $id)->update([
              'post' => $up_post,]);
        // 3つ目の処理
        return redirect('/top');
    }

public function follower(){
         $posts = Post::latest()->get();
         $users = User::get();
        return view('follows.followerList',['posts'=>$posts,'users'=>$users]);
    }

    public function follow(){
         $posts = Post::latest()->get();
         $users = User::get();
        return view('follows.followList',['posts'=>$posts,'users'=>$users]);
    }


    public function show(){
// フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck(' following_id ');

// フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn(' username ', $following_id)->get();
  return view('follows.followerList', compact('posts'));
}
}
