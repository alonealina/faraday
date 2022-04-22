<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>faraday</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />

        <!-- <link rel="icon" type="image/png" href="{{ asset('img/omisenavi_favicon.png') }}"> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <!-- <link rel="icon" type="image/png" href="https://mall.cpon.co.jp/favicon.png"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Devanagari:wght@600&amp;display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Devanagari:wght@400;600&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <header>
            <img src="{{ asset('img/logo.png') }}" class="header_logo" alt="">
        </header>

        @yield('content')

        <footer>
            <div class="footer_text">
                お問い合わせ先<br><br>
                株式会社ファラデー<br>
                電話：06-7777-3500 (受付時間　平日9:00~18:00)<br>
                メール：ppa@faradaycorp.co.jp
            </div>
            <img src="{{ asset('img/logo_f.png') }}" class="footer_logo" alt="">
        </footer>
    </body>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>