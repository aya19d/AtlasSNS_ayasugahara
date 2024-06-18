@extends('layouts.login')

@section('content')

<!-- フォーム -->
  <div class="form-group">
    <img src="{{asset('storage/storage/'.Auth::user()->images)}} "  class=form_icon>
         {!! Form::open(['url' => '/top' , 'onsubmit'=>'return false;']) !!}
         {{ Form::textarea('post', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください']) }}
         @foreach ($errors->all() as $error)
           <div class=form_error>{{$error}}</div>
         @endforeach
            <button type="button" class=btn onClick="submit();"><img src="images/post.png" class="btn_submit"> </button>
         {!! Form::close() !!}
  </div>

<!-- 投稿表示 -->
<ul>

  @foreach ($posts as $post)

  <!-- useridが自分のことをフォローしていたら -->
@if (auth()->user()->isFollowing($post->user_id)
|| $post->user_id == Auth::user()->id)


  <li class=post_block>
   <div class=post_block1>
     <figure><img src="{{asset('storage/storage/'. $post -> user -> images)}} "  class=post_icon></figure>

    <div class=post_content>
      <div class=post_name>{{ $post -> user -> username}}</div>
      <div class=post_post>{!! nl2br(htmlspecialchars($post->post)) !!}</div>
    </div>

    <div class=post_time>{{ $post -> created_at->format('Y/m/d H:i') }}</div>
   </div>
   <!-- 編集 -->
   <div class=post_btn>
     @if (Auth::user()->id == $post->user_id)
     <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" class=btn_submit></a></td>


     <!-- 削除 -->
     <td><a class="btn-danger" href="/top/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png" class=btn_submit> <img src="images/trash-h.png" class=btn_submit></a></td>
     @endif
    </div>
  </li>

  @endif
  @endforeach
</ul>

<!-- モーダル -->
<div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>

<div class="modal_content">
    <form action="/top/{{$post->id}}/update-form" method="post">
        <textarea name="upPost" class="modal_post"></textarea>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="id" class="modal_id" value="">
        <input type="submit" value="" class="modal_btn_submit">
        {{ csrf_field() }}
    </form>
    <a class="js-modal-close" href=""></a>
</div>

</div>
@endsection
