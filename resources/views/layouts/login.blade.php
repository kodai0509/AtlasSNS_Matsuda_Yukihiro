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
          <p>フォロー数</p>
          <p>{{ $followCount ?? 0 }}名</p>
        </div>
        <p class="btn"><a href="{{ route('follow.list') }}">フォローリスト</a></p>
        <div>
          <p>フォロワー数</p>
          <p>{{ $followerCount ?? 0 }}名</p>
        </div>
        <p class="btn"><a href="{{ route('follower.list') }}">フォロワーリスト</a></p>
        <p class="btn"><a href="{{ route('search') }}">ユーザー検索</a></p>
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
