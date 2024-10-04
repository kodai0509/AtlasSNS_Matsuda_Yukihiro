<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>

        header {
            background-color: #007BFF;
            color: white;
            padding: 10px;
        }

        /* 矢印の設定 */
        .arrow {
            font-size: 18px;
            color: white;
            margin-left: 5px;
            cursor: pointer;
        }

        /* メニューリストの設定 */
        .menu-list {
           list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            background-color: white;;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            top: 100px;
            right: 0px;
            width: 150px;
            display: none;
        }

        .menu-list li{
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #eee;
             background-color: #f0f0f0;
        }

        .menu-list li:last-child{
            border-bottom: none;
        }

        .menu-list li:hover,
        .menu-list li:active{
             background-color: #0056b3; /* 選択時に青に */
             color: white;
        }

        .menu-list a{
            text-decoration: none;
            color: #666;
            display: block;
        }

        /* クリック時の動き */

        [x-show="open"] {
            display: block;
        }

        [x-clock] {
            display: none;
        }

        /* ユーザー名・アイコンの設定 */
        .user-menu {
            display: flex;
            align-items: center;
            position: relative;
        }

        .user-menu img {
            height: 30px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .user-name {
            font-size: 18px;
            margin-right: 10px;
        }

    </style>
</head>

<body>
<header x-data="{ open: false }">
    <div id="head" style="display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('index') }}">
            <img src="{{ asset('images/atlas.png') }}" style="height: 40px; vertical-align: middle;">
        </a>

        <div style="display: flex; align-items: center;">
            <div style="display: flex; align-items: center;">

            <!-- ユーザー名表示 -->
                <p style="margin: 0; font-size: 18px;">{{ Auth::user()->username }} さん</p>
                <span @click="open = !open" class="arrow">
                    <span x-text="open ? '▲' : '▼'"></span>
                </span>
            </div>

            <!-- アイコン表示 -->
            <img src="{{ asset('images/icon1.png') }}">


            <!-- アコーディオンメニュー -->
            <ul x-show="open" x-cloak class="menu-list">
                <li>
                    <a href="{{ route('index') }}" style="color: white; text-decoration: none;">ホーム</a>
                </li>
                <li>
                    <a href="{{ route('profiles.profile') }}" style="color: white; text-decoration: none;">プロフィール編集</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" style="color: white; text-decoration: none;">ログアウト</a>
                </li>
            </ul>
        </div>
    </div>
</header>

</body>

</html>
