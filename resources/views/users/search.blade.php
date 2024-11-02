<x-login-layout>
    @section('content')
    <!-- 検索フォーム -->
    <form action="{{ route('search') }}" method="POST" class="mb-4">
        @csrf
        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="ユーザー名を入力"
            value="{{ request('keyword') }}">
        <button type="submit" class="btn btn-success">
            <img src="{{ asset('images/search.png') }}" alt="Search Icon">
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach ($users as $user)
                        <div class="card mb-3">
                            <div class="card-header p-3 w-100 d-flex">
                                <img
                                    src="{{ asset('images/' . $user->icon_image) }}"
                                    alt="UserIcon"
                                    class="user-icon">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->username }}</p>
                                </div>
                                <div class="d-flex justify-content-end flex-grow-1">
                                    @if (auth()->user()->isFollowing($user->id))
                                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                フォロー解除
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                フォローする
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
