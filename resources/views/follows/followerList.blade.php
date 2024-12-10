<x-login-layout>

<!-- フォロワーリストのアイコン表示 -->
<div class="follower-icons">
   @foreach($followerUsers as $follower)
   <a href="{{ route('profile.show',['user' => $follower->id]) }}">
      <img src="{{ asset('/images/' . $follower->icon_image) }}">
   </a>
   @endforeach
</div>

<!-- 自分をフォローしている人の投稿一覧 -->
<div class="follower-index">
    @foreach($posts as $post)
    <ul>
      <li class="post-block" style="position: relative;">
         <figure>
            <a href="{{ route('profile.show', ['user' => $post->user->id]) }}">
             <img src="{{ asset('/images/' . $post->user->icon_image) }}">
             </a>
         </figure>
         <div class="follower-content">
            <div class="follower-name">{{ $post->user->username }}</div>
            <div class="follower-post">{{ $post->content }}</div>
         </div>
         <div class="date" style="position: absolute; right: 10px;">
            {{ $post->created_at }}
         </div>
      </li>
    </ul>
   @endforeach
</div>

</x-login-layout>
