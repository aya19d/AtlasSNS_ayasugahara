@extends('layouts.login')

@section('content')

<!-- 相手のプロフィール -->
<div class=prof_content>
       <div class=prof_icon><img src="{{ asset('images/icon1.png') }} "></div>
    <div class=prof_group>
       <div class=prof_title>ユーザー名</div>
       <div class=prof_text>{{ $user -> username}}</div>
       <div class=prof_title>自己紹介</div>
       <div class=prof_text>{{ $user -> bio}}</div>
     </div>

<!-- フォローorフォロー解除 フォローしていなければフォローボタン、フォローしていればフォロー解除ボタンが表示される-->
<div class="prof_follow_btn">
  @if (auth()->user()->isFollowing($user->id))
  <form action="/follow/{{$user->id}}/remove" method="post">
    @csrf
    <input type="submit" type="hidden" name="{{$user->id}}" class="unfollow_btn" value="フォロー解除">
  </form>
  @else
  <form action="/follow/{{$user->id}}/add" method="post">
    @csrf
    <input type="submit" type="hidden" name="{{$user->id}}" class="follow_btn" value="フォローする">
  </form>
  @endif
</div>
</div>

<!-- 投稿表示 -->
   @foreach ($posts as $post)
  <div class=prof_list>
     <div><img src="{{ asset('images/icon1.png') }} " class=proflist_icon></div>
    <div class=post_content>
      <div class=post_name>{{ $post -> user -> username}}</div>
      <div class=post_time>{{ $post -> created_at}}</div>
      <div class=post_post>{{ $post -> post }}</div>
    </div>
  </div>
    @endforeach




@endsection
