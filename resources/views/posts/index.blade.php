<x-login-layout>
   <div class="container">
      {!! Form::open(['url' => '/posts/index']) !!}

      <!-- 新しい投稿フォーム -->
      <div class='post'>
         <img src="{{ asset('images/icon1.png') }}">
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
         <div class="button">
            <button type="submit"><img src="{{ asset('images/post.png') }}"></button>
         </div>
      </div>
      {!! Form::close() !!}

      <!-- 投稿を表示 -->
      @foreach($posts as $post)
         <div class="content">
             @if($post->user)

            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post }}</p>

            <!-- 投稿の編集ボタン -->
            @if(auth()->user()->id === $post->user_id)
               <a class="js-modal-open" href="javascript:void(0);" data-post="{{ $post->post }}" data-post-id="{{ $post->id }}">
                  <img src="{{ asset('images/edit.png') }}">
               </a>
            @endif

            @else
                <p>この投稿のユーザー情報は存在しません。</p>
            @endif
         </div>
      @endforeach

      @if($posts->isEmpty())
          <p>投稿がありません。</p>
      @endif

      <!-- モーダルの中身 -->
      <div class="modal js-modal">
         <div class="modal__bg js-modal-close"></div>
         <div class="modal__content">
            <!-- 編集フォーム -->
            {!! Form::open(['method' => 'put', 'id' => 'editForm']) !!}
               <textarea name="post" class="modal_post" maxlength="150"></textarea>
               <input type="hidden" name="post_id" class="modal_id" value="">
               <input type="submit" value="更新">
               {{ csrf_field() }}
            {!! Form::close() !!}
            <a class="js-modal-close" href="javascript:void(0);">閉じる</a>
            <!-- 削除 -->

         </div>
      </div>
   </div>

   <!-- JavaScript -->
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         // モーダルを開く
         const modalOpenLinks = document.querySelectorAll('.js-modal-open');
         const modal = document.querySelector('.js-modal');
         const modalCloseLinks = document.querySelectorAll('.js-modal-close');
         const modalPostInput = document.querySelector('.modal_post');
         const modalIdInput = document.querySelector('.modal_id');
         const editForm = document.getElementById('editForm');

         modalOpenLinks.forEach(link => {
            link.addEventListener('click', function (e) {
               e.preventDefault();
               const post = this.getAttribute('data-post');
               const postId = this.getAttribute('data-post-id');

               // モーダルにデータを設定
               modalPostInput.value = post;
               modalIdInput.value = postId;

               // フォームのアクションURLを設定
               editForm.action = `/posts/update/${postId}`;

               // モーダルを表示
               modal.style.display = 'block';
            });
         });

         // モーダルを閉じる
         modalCloseLinks.forEach(link => {
            link.addEventListener('click', function (e) {
               e.preventDefault();
               modal.style.display = 'none';
            });
         });

         // 背景クリックでモーダルを閉じる
         document.querySelector('.modal__bg').addEventListener('click', function () {
            modal.style.display = 'none';
         });
      });
   </script>

   <!-- Bootstrap用スクリプト -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</x-login-layout>
