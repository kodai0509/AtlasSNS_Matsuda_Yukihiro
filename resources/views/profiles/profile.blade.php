<x-login-layout>
    <!-- プロフィール -->
    <div class="profile">
        <!-- アイコン表示 -->
        <img src="{{ asset('/images/' . $user->icon_image) }}" style="width: 40px; height: 40px; margin-right: 10px;">

        <!-- ユーザー名 -->
        <div class="username">ユーザー名：{{ $user->username }}</div>
        <!-- 自己紹介 -->
        <div class="user_profile">自己紹介：{{ $user->bio }}</div>

        <!-- フォローする/フォロー解除ボタン -->
        <div>
            @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
        </div>
    </div>

    <!-- 投稿一覧 -->
    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <!-- 投稿者情報 -->
                <div class="post-username">投稿者: {{ $post->user->username }}</div>
                <!-- 投稿内容 -->
                <div class="post-content">{{ $post->content }}</div>
            </div>
        @endforeach
    </div>
</x-login-layout>
