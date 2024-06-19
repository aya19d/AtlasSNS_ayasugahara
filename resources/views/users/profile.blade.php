@extends('layouts.login')

@section('content')

<!-- 相手のプロフィール -->
<div class=prof_content>
       <div class=prof_icon><img src="{{ asset('images/icon1.png') }} "></div>
    <div class=prof_group>
      <div class=prof_name>
       <div class=prof_title>ユーザー名</div>
       <div class=prof_text>{{ $user -> username}}</div>
      </div>
      <div class=prof_bio>
       <div class=prof_title>自己紹介</div>
       <div class=prof_text>{{ $user -> bio}}</div>
       </div>
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
  <li class=post_block>
    <div class=post_block1>
     <figure><img src="{{asset('storage/storage/'. $post -> user -> images)}} "  class=post_icon></figure>

    <div class=post_content>
      <div class=post_name>{{ $post -> user -> username}}</div>
      <div class=post_post>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
    </div>

    <div class=post_time>{{ $post -> created_at->format('Y/m/d H:i') }}</div>
   </div>
    @endforeach

</li>


@endsection
