<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title>プロフィール</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>

  <div id="row">
    <div id="container">
    {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>{{ Auth::user()->username }}さんの</p>
        <div>
          <p>フォロー数 {{ $followCount }}名</p>
        </div>
        <button type="button" class="btn btn-primary"><a href="{{ route('follow.list') }}" style="color: white;">フォローリスト</a></button>
        <div>
          <p>フォロワー数 {{ $followerCount }}名</p>
        </div>
        <button type="button" class="btn btn-primary"><a href="{{ route('follower.list') }}" style="color: white;">フォロワーリスト</a></button>
        <button type="button" class="btn btn-primary"><a href="{{ route('search') }}" style="color: white;">ユーザー検索</a></button>
      </div>
    </div>
  </div>

  <footer>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="JavaScriptファイルのURL"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>

</html>
