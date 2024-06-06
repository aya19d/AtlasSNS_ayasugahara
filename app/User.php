<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// 多対多リレーション
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(Self::class,'follows','following_id','followed_id');
        // →belongsToMany(このテーブル（Users Table）、中間テーブル（follows Table）、Users Tableのfollowing_id、Follows Tableのfollowed_id)

    }

       public function followed(): BelongsToMany
    {
        return $this->belongsToMany(Self::class,'follows','followed_id','following_id');
    }

        public function posts(){
        return $this->hasMany('App\Post');
    }

     // フォローする
 public function follow(Int $user_id)
 {
 return $this->follows()->attach($user_id);
 }
 // フォロー解除する
 public function unfollow(Int $user_id)
 {
 return $this->follows()->detach($user_id);
 }

     // フォローしているか　検索のフォローorフォロー解除
 public function isFollowing(Int $user_id)
 {
 return (boolean) $this->following()->where('followed_id', $user_id)->first(['follows.id']);
 }
// →UserPHPの多角多リレーションpublicfunctionfollowingにてfollowsTableのfollowed_idに＄user_idがあるか○か✖️か

 // フォローされているか
 public function isFollowed(Int $user_id)
 {
 return (boolean) $this->followed()->where('following_id', $user_id)->first(['follows.id']);
 }

}
