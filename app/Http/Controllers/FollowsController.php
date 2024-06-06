<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authファサードを読み込む
use App\Follow;

class FollowsController extends Controller
{

    //フォローしているかどうかの状態確認
    public function check_following($id){

        //自分がフォローしているかどうか検索
        $check = Follow::where('following', Auth::id() )->where('followed', $id);

        if($check->count() == 0):
            //フォローしている場合
            return response()->json(['status' => false]);
        elseif($check->count() != 0):
            //まだフォローしていない場合
            return response()->json(['status' => true]);
        endif;

      return back();
    }

    //フォローする(中間テーブルをインサート)
    public function following(Request $request){
        // dd($request,$request->id);
        //自分がフォローしているかどうか検索
        $check = Follow::where('following_id', Auth::id())->where('followed_id', $request->id);

        //検索結果が0(まだフォローしていない)場合のみフォローする
        if($check->count() == 0):
            $follow = new Follow;
            $follow->following_id = Auth::id();
            $follow->followed_id = $request->id;
            $follow->save();
        endif;
      return back();
    }


    //フォローを外す
    public function unfollowing(Request $request){

        //削除対象のレコードを検索して削除
        $unfollowing = Follow::where('following_id', Auth::id())->where('followed_id', $request->id)->delete();

      return back();
    }
}
