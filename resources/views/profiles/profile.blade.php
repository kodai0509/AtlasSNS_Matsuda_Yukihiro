<x-login-layout>
<div class="profile" style="display: flex; align-items: center; gap: 20px;">
    <!-- アイコン表示 -->
    <div>
        <img src="{{ asset('/images/' . $user->icon_image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
    </div>

    <!-- 自分かその他のユーザーの分岐 -->
    @if(auth()->id() == $user->id)
    <!-- ログインユーザーの場合 -->
    <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 10px;">
        @csrf
        @method('PUT')
        <!-- ユーザー名編集 -->
        <div>
            <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
        </div>

        <!-- メールアドレス編集 -->
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- 自己紹介文編集 -->
        <div>
            <label for="bio">自己紹介文</label>
            <textarea id="bio" name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <!-- パスワード -->
        <div>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password">
        </div>

        <!-- パスワード確認 -->
        <div>
            <label for="password_confirmation">パスワード確認</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <!-- アイコン -->
        <div>
            <label for="icon_image">アイコン画像</label>
            <input type="file" id="icon_image" name="icon_image">
        </div>

        <!-- 保存ボタン -->
        <button type="submit" class="btn btn-success">更新</button>
    </form>
    @else

    <!-- その他ユーザー名と自己紹介 -->
    <div>
        <div class="username">ユーザー名：{{ $user->username }}</div>
        <div class="user_profile">自己紹介：{{ $user->bio }}</div>
    </div>

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
    @endif
</div>

<div class="post-index">
    @foreach($posts as $post)
    <ul>
        <li class="post-block" style="position: relative;">
            <figure>
                <img src="{{ asset('/images/' . $post->user->icon_image) }}" class="user-icon">
            </figure>
        </li>
        <div class='content'>
            <div class="post-name">{{ $post->user->username }}</div>
            <div class="post">{{ $post->post }}</div>
        </div>
        <div class="date">{{ $post->created_at }}</div>
    </ul>
    @endforeach
</div>
</x-login-layout>
