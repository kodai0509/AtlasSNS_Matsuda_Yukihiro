<x-login-layout>
    @section('content')
    <!-- 新しい投稿フォーム -->
    {!! Form::open(['route' => 'posts.store']) !!}
    <div class="form-group">
        <!-- アイコン表示 -->
        <img src="{{ asset('/images/' . $user->icon_image) }}">

        <!-- 投稿フォーム -->
        {!! Form::textarea('newPost', null, ['class' => 'form-control','name'=>'newPost','required','placeholder' => '投稿内容を入力してください。',]) !!}

        <!-- ポストアイコン -->
        <button type="submit" class="post-icon">
            <img src="{{ asset('images/post.png') }}">
        </button>
    </div>
    {!! Form::close() !!}

    <!-- 投稿を表示 -->
    <div class="post-index">
        @foreach($posts as $post)
        <ul>
            <li class="post-block" style="position: relative;">
                <figure>
                    <img src="{{ asset('/images/' . $post->user->icon_image) }}"
                        class="user-icon">
                </figure>
                <div class='post-content'>
                    <div class="post-name">{{ $post->user->username }}</div>
                    <div class="post">{{ $post->post }}</div>
                </div>
                <div class="date">{{ $post->created_at }}</div>
                <!-- ログインユーザーの投稿にのみ編集・削除ボタンを表示 -->
                @if($post->user_id === auth()->id())
                <!-- 編集アイコン -->
                <img src="{{ asset('images/edit.png') }}"
                    class="edit-icon" onclick="toggleEditForm({{ $post->id }})">

                <!-- 削除アイコン -->
                <a href="#" onclick="submitDeleteForm(event, {{ $post->id }})">
                    <img src="{{ asset('images/trash-h.png') }}" class="delate" alt="削除">
                </a>

                <form id="delete-form-{{ $post->id }}" method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <!-- 編集フォーム -->
                <form method="POST" action="{{ route('posts.update', $post->id) }}"
                    accept-charset="UTF-8" id="editForm-{{ $post->id }}"
                    style="display: none; margin-top: 10px;">
                    @csrf
                    @method('PUT')
                    <textarea name="post" class="modal_post" maxlength="150">{{ $post->post }}</textarea>
                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
                @endif
            </li>
        </ul>
        @endforeach
    </div>

    <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

    <script>
        function toggleEditForm(postId) {
            const form = document.getElementById('editForm-' + postId);
            const isVisible = form.style.display === 'block';
            form.style.display = isVisible ? 'none' : 'block';
        }

        function submitDeleteForm(event, postId) {
            event.preventDefault();
            if (confirm('こちらの投稿を削除してもよろしいでしょうか？')) {
                document.getElementById(`delete-form-${postId}`).submit();
            }
        }
    </script>

</x-login-layout>
