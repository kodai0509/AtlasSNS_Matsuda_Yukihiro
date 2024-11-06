<x-login-layout>

<div class='container'>
<!-- ヘッダー（フォロワーリストのアイコン表示 -->
<div class='header'>
<img src="{{ asset('/images/' . $user->icon_image) }}">
</div>


<!-- 自分をフォローしている人の投稿一覧 -->
<div class='follower-posts'>
   @foreach($posts as $post)
   <div class='post'>
    <img src="{{ asset('/images/' . $user->icon_image) }}">
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{ $post->created_at }}</p>
   </div>
   @endforeach
</div>
</div>

</x-login-layout>
