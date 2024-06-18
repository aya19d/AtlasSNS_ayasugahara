<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id="headmenu">
                <h1><a href=/top><img src="{{ asset('images/atlas.png') }} " class=atlaslogo></a></h1>
            <div class=headcontent>
                <p class=headname>{{Auth::user()->username}}さん</p>
                <div class="menu">
                    <input type="checkbox" id="menu_bar01" />
                    <label for="menu_bar01"></label>
                   <ul id="links">
                    <li><a href="/top" class=menu_text>HOME</a></li>
                    <li><a href="/myprofile/{{Auth::user()->id}}" class=menu_text>プロフィール編集</a></li>
                    <li><a href="/logout" class=menu_text>ログアウト</a></li>
                   </ul>
                </div>

                <img src="{{asset('storage/storage/'.Auth::user()->images)}} " class=headicon>
            </div>
        </div>

    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="follow_info">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p class=number>フォロー数
                {{ Auth::user()->following()->get()->count() }}名</p>
                </div>
                <p><a href="/follow-list" class="btn_list">フォローリスト</a></p>
                <div>
                <p class=number>フォロワー数
                {{ Auth::user()->followed()->get()->count() }}名</p>
                </div>
                <p><a href="/follower-list" class="btn_list">フォロワーリスト</a></p>
            </div>
            <p class=border><a href="/search" class="btn_search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- jQuery CDNで提供されたリンク -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
