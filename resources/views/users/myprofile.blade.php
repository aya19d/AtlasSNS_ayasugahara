@extends('layouts.login')

@section('content')

<!-- エラーメッセージ -->
@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

<div class="myprof_container">
  <figure><img src="{{ asset('images/icon1.png') }} "  class=myprof_icon></figure>
   <div class=myproflist_container>
{!! Form::open(['url' => '/myprofile' , "method" => "POST","enctype" => "multipart/form-data"]) !!}
{{ Form::hidden('id', $user->id) }}
          <div class=myprof_block>
            {{ Form::label('myprof_list','ユーザー名') }}
            {{ Form::input('text', 'username', $user->username, ['required', 'class' => 'form-control']) }}
          </div>
          <div class=myprof_block>
            {{ Form::label('myprof_list','メールアドレス') }}
            {{ Form::input('text', 'mail', $user->mail, ['required', 'class' => 'form-control']) }}
            </div>
            <div class=myprof_block>
            {{ Form::label('myprof_list','パスワード') }}
            {{ Form::input('password','password', null, ['required', 'class' => 'form-control']) }}
            </div>
            <div class=myprof_block>
            {{ Form::label('myprof_list','パスワード確認') }}
            {{ Form::input('password','password_confirmation', null, ['required', 'class' => 'form-control']) }}
            </div>
            <div class=myprof_block>
            {{ Form::label('myprof_list','自己紹介') }}
            {{ Form::input('text', 'bio', $user->bio, ['class' => 'form-control']) }}
            </div>
            <div class=myprof_block>
            {{ Form::label('myprof_list','アイコン画像') }}
            {{ Form::input('file','images', $user->images,[ 'class' => 'form-control']) }}
            </div>

        </div>
      </div>
        <button type="submit" class="update_btn">更新</button>
        {!! Form::close() !!}







@endsection
