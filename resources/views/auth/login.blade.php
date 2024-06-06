@extends('layouts.logout')

@section('content')

<div class=form_container>
{!! Form::open(['url' => '/login']) !!}
  <p class=text1>AtlasSNSへようこそ</p>


{{ Form::label('text2','メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('text2','パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン',['class' => 'btn_login']) }}

<p class=text3><a href="/register" class=text3>新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</>
@endsection
