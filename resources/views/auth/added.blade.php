<x-logout-layout>
  <div id="clear">
    <p>{{ auth()->user()->name }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <p class="btn"><a href="{{ route('login') }}">ログイン画面へ</a></p>
  </div>

  <!--未認証の場合はログイン画面へ -->
    @endauth
    @guest
    <p>ログインしてください。</p>
    @endguest

</x-logout-layout>
