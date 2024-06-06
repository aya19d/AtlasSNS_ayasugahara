@extends('layouts.logout')

@section('content')
<div class=form_container>
<div id="welcome">
  <p class=text4>{{session('UserName')}}さん</p>
  <p class=text4>ようこそ！AtlasSNSへ！</p>
</div>
<div id="welcome_text">
  <p class=text5>ユーザー登録が完了しました。</p>
  <p class=text5>早速ログインをしてみましょう。</p>
</div>

  <p><a href="/login" class=btn>ログイン画面へ</a></p>
</div>
</div>
@endsection
