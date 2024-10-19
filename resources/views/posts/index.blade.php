<x-login-layout>
    <!-- 新しい投稿フォーム -->
    <div class='container'>
        {!! Form::open(['route' => 'posts.store']) !!}
        <div class="form-group">
            <!-- アイコン表示 -->
            <img src="{{ asset('/images/' . $user->icon_image) }}">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
            <button type="submit" class="btn pull-right">
                <img src="{{ asset('images/post.png') }}">
            </button>
        </div>
        {!! Form::close() !!}
    </div>

    <!-- 投稿を表示 -->
    <table class="table table-hover">
        @foreach($posts as $post)
            <tr>
                <!-- アイコン修正 -->
                <th><img src="{{ asset('/images/' . $post->user->icon_image) }}"></th>
                <th>{{ $post->user->username }}</th>
                <th>{{ $post->post }}</th>
                <th>{{ $post->created_at }}</th>
                <!-- 編集フォーム -->
                <th>
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" accept-charset="UTF-8" id="editForm">
                        @csrf
                        @method('PUT')
                        <textarea name="post" class="modal_post" maxlength="150">{{ $post->post }}</textarea>
                        <button type="submit" class="btn btn-primary">
                            <img src="{{ asset('images/edit.png') }}">
                        </button>
                    </form>
                </th>
                <!-- 削除 -->
                <th>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('こちらの投稿を削除してもよろしいでしょうか？');">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <img src="{{ asset('images/trash-h.png') }}">
                       </button>
                     </form>
                 </th>
            </tr>
        @endforeach
    </table>
</x-login-layout>
