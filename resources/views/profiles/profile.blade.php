<x-login-layout>
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
</x-login-layout>
