<x-login-layout>

<!--フォローリストのアイコン表示 -->
<div class="follow-icon">
   @foreach($followingUsers as $follow)
   <a href="{{ route('profiles.profile',['user' => $follow->id]) }}">
    <img src="{{ asset('/images/' . $user->icon_image) }}">
   </a>

  @endforeach
 </div>

 <!--自分がフォローしているユーザーを表示 -->
<div class="follow-index">
 @foreach($posts as $post)
 <ul>
  <li class="post-block" style="position: relative;">
    <figure>
      <a href="{{ route('profiles.profile', ['user' => $post->user->id]) }}">
        <img src="{{ asset('/images/' . $post->user->icon_image) }}">
      </a>
    </figure>
    <div class='follow-content'>
      <div class='follow-name'>{{ $post->user->username }}</div>
      <div class='follow-post'>{{ $post->post }}</div>
    </div>
    <div class="date" style="position: absolute; right: 10px;">
      {{ $post->created_at }}
    </div>
  </li>
 </ul>
 @endforeach
</div>
</x-login-layout>
