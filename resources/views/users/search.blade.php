<x-login-layout>
    <div class="container">
        <!-- 検索フォーム -->
        <form action="{{ route('search') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="keyword" class="form-control" placeholder="ユーザー名を入力" value="{{ request('keyword') }}">
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
            <ul>
                @foreach ($users as $user)
                    <li class="user-item">
                        <img src="{{ asset('images/' . $user->icon_image) }}" alt="User Icon" class="user-icon">
                        <span class="username">{{ $user->username }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-login-layout>
