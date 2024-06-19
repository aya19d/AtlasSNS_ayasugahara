@extends('layouts.login')

@section('content')


<!-- アイコン表示 -->
<div class=followicon_container>
  <p class=follow_title>フォローリスト</p>
  <div class=followlist_block>
@foreach($users as $user)

<!-- useridを自分がフォローしていたら -->
@if (auth()->user()->isFollowing($post->user_id)
|| $post->user_id == Auth::user()->id)

<!-- 自分以外表示 -->
@if ($user->id !== Auth::user()->id)

<p class="followlist_btn"><a href="/profile/{{$user->id}}"><img src="{{asset('storage/storage/'. $user -> images)}} " class=follow_icon></a></p>

@endif
@endif

@endforeach
</div>
</div>

<!-- 名前と投稿 -->
<ul>
@foreach($posts as $post)

<!-- useridが自分のことをフォローしていたら -->
@if (auth()->user()->isFollowing($post->user_id))

<!-- 自分以外表示 -->
@if ($user->id !== Auth::user()->id)
<li class=post_block>
  <div class=post_block1>
  <p class="btn"><a href="/profile/{{$post->user_id}}"><img src="{{asset('storage/storage/'. $user -> images)}} " class=post_icon></a></p>
  <div class=post_content>
 <div class=post_name>{{ $post -> user -> username}}</div>
 <div class=post_post>{{ $post->post }}</div>
</div>
 <div class=post_time>{{ $post -> created_at->format('Y/m/d H:i')}}</div>
</div>
@endif
@endif

@endforeach
</li>
</ul>

@endsection
