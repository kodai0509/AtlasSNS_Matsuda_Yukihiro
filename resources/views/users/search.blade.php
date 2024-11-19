<x-login-layout>
    @section('content')
    <!-- 検索フォーム -->
    <form action="{{ route('search') }}" method="POST" class="mb-4">
        @csrf
        <input
            type="text" name="keyword" class="form" placeholder="ユーザー名を入力"
            value="{{ request('keyword') }}">
        <button type="submit" class="btn btn-success">
            <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 20px; height: 20px;">
        </button>
    </form>

    <!-- 検索ワードの表示 -->
    @if(!empty(request('keyword')))
        <p>検索ワード: <strong>{{ request('keyword') }}</strong></p>
    @endif

    <!-- 検索結果の表示 -->
    @if($users->isEmpty())
        <p>No users found.</p>
    @else

    @foreach ($users as $user)
    <ul style="list-style: none; padding: 0;">
        <li style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center;">
                <a href="{{ route('profile.show', ['user' => $user->id]) }}">
                    <img src="{{ asset('images/' . $user->icon_image) }}" style="width: 50px; height: 50px; margin-right: 10px;">
                </a>
                <p class="mb-0">{{ $user->username }}</p>
            </div>
            <div>
                @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        フォロー解除
                    </button>
                </form>
                @else
                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        フォローする
                    </button>
                </form>
                @endif
            </div>
        </li>
    </ul>
    @endforeach

    @endif

    <!-- リロード用ボタン -->
    <div class="mt-4">
        <form action="{{ route('search') }}" method="GET">
            <!-- <button type="submit" class="btn btn-info">
                ユーザー検索ページに戻る
            </button> -->
        </form>
    </div>
</x-login-layout>
