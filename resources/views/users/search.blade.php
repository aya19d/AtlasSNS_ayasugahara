@extends('layouts.login')

@section('content')
<!-- 検索フォーム -->
<div class=search_container>
        <form action="/search" method="post">
           @csrf
           <input type="text" name="keyword" class="search_form" placeholder="  ユーザー名">
           <button type="submit" class="btn btn-success" onclick="Click_Sub()"><img src="images/search.png" class=search_image></button>
        </form>

@if(request()->has('keyword'))
        <p id=div1 class=search_word>検索ワード：{{ $keyword }}</p>
@endif
</div>

<!-- 検索結果 -->
<div class=searchlist_container>
  @foreach ($username as $user)

  <div class=search_list>
     <!-- 自分以外表示 -->
   @if ($user->id !== Auth::user()->id)
    <figure><img src="{{asset('storage/storage/'. $user -> images)}} " class=search_icon></figure>
    <p class=search_name>{{ $user->username }}</p>

    <!-- フォローorフォロー解除 フォローしていなければフォローボタン、フォローしていればフォロー解除ボタンが表示される-->
    <div class="userSearchButton">
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
    @endif

  </div>
 @endforeach
</div>


@endsection
