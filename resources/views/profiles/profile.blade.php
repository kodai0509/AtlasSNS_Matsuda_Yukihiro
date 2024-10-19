<x-login-layout>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>プロフィール</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('layouts.navigation')
    </header>

    <div id="container">
        <h1>{{ $user->username }}さんのプロフィール</h1>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ $user->username }}さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>{{ $followCount }}名</p>
                </div>
                <p class="btn"><a href="{{ route('follow.list') }}">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>{{ $followerCount }}名</p>
                </div>
                <p class="btn"><a href="{{ route('follower.list') }}">フォロワーリスト</a></p>
                <p class="btn"><a href="{{ route('search') }}">ユーザー検索</a></p>
            </div>
        </div>
    </div>
</body>
</html>


</x-login-layout>
