<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Image;

class UsersController extends Controller
{


// ユーザー名の検索
     public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
             $username = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
             $username = User::all();
        }
        // 3つ目の処理
        return view('users.search',['username'=>$username,'keyword'=>$keyword]);
    }


     public function profile($id){
        $users = User::where('id',$id)->first();
        $posts = Post::where('user_id',$id)->latest()->get();
    return view('users.profile',['user'=>$users,'posts'=>$posts]);
    }


    public function userProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.myprofile',['user'=>$user]);
    }

    public function update(Request $request)
    {

                // バリデーション
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|email:strict,dns,spoof|unique:users,mail,'.Auth::id(),
            'password' => 'required|min:8|max:20|alpha_dash|confirmed',
            'password_confirmation' => 'required|min:8|max:20|alpha_dash',
            'bio' => 'max:150',
            'images' => 'image|nullable',
            ]);

        // 1つ目の処理
        $id = $request->input('id');
        $mail = $request->input('mail');
        $username = $request->input('username');
        $password = $request->input('password');
        $bio = $request->input('bio');

        if ($images = $request->file('images')){
            $user = Auth::user();

       // name属性が'images'のinputタグをファイル形式に、画像をpublic/imagesに保存
        $images_save = $request->file('images')->store('public/storage');

        // 上記処理にて保存した画像に名前を付け、userテーブルのthumbnailカラムに、格納
        $user->images = basename($images_save);

        $user->save();

}



        // 2つ目の処理
        User::where('id', $id)->update([
              'username' => $username,
              'password' => Hash::make($password),
              'bio' => $bio,
            //   'images' => $images
        ]);
        // 3つ目の処理
        return redirect('/top');
}

}
