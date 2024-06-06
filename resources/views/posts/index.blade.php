@extends('layouts.login')

@section('content')

<!-- フォーム -->
  <div class="form-group">
    <img src="images/icon1.png" class=form_icon>
         {!! Form::open(['url' => '/top']) !!}
         {{ Form::input('text', 'post', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください']) }}
            <button type="submit" class=btn><img src="images/post.png" class="btn_submit"> </button>
         {!! Form::close() !!}
  </div>

<!-- 投稿表示 -->
<ul>
@foreach ($posts as $post)
  <li class=post_block>
   <div class=post_block1>
     <figure><img src="images/icon1.png" class=post_icon></figure>

    <div class=post_content>
      <div class=post_name>{{ $post -> user -> username}}</div>
      <div class=post_post>{{ $post->post }}</div>
    </div>

    <div class=post_time>{{ $post -> created_at}}</div>
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
  @endforeach
</ul>

<!-- モーダル -->
<div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>

  <div class="modal_content">
           <form action="/top/{{$post->id}}/update-form" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="" class=modal_btn_submit>
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href=""></a>
  </div>
</div>
@endsection
