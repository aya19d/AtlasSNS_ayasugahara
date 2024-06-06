@extends('layouts.logout')

@section('content')

<div class=form_container>
{!! Form::open(['url' => '/register']) !!}

<h2 class=text1>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::input('password','password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::input('password','password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('新規登録',['class' => 'btn_login']) }}

<p class=text3><a href="/login" class=text3>ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif
</div>

@endsection
