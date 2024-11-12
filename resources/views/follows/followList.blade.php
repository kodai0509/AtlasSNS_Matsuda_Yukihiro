<x-login-layout>

<div class="container">
<!-- ヘッダー（フォローリストのアイコン表示 -->
 <div class="header">
  <img src="{{ asset('/images/' . $user->icon_image) }}">
 </div>

<!--自分がフォローしているユーザーを表示 -->
<div class="follow-posts">
  @foreach($posts as $post)
  <div class='post'>
    <!-- <a href="{{ route('profiles.profile', ['user' => $user->id]) }}"> -->
      <img src="{{ asset('/images/' . $user->icon_image) }}">
    </a>
    <p>{{ $post->user->username }}</p>
    <p>{{ $post->post }}</p>
    <p>{{ $post->created_at }}</p>
  </div>
  @endforeach
</div>

</div>


</x-login-layout>
