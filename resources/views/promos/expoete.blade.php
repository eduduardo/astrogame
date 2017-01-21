<!DOCTYPE html>
<html dir="ltr" lang="{{ \Lang::getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Expoete 2016</title>

    {!! Minify::stylesheet(['/vendor/uikit/css/normalize.css', '/vendor/uikit/css/uikit.gradient.css', '/css/project/expoete.css'])->withFullUrl() !!}
    <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="uk-container uk-container-center">
        <video src="http://localhost/trailer_sem_logo.mp4" width="1080" autoplay style="position: fixed; right: 10%;padding: 6px;background: #fff;border-radius: 3px;margin: 10px" loop></video>
    </div>
    <img src="{{ asset('img/expoete_qrcode.jpg')}}" width="250" style="position: fixed; bottom: 1%; left: 1%">
    <a href="https://astrogame.me" style="font-size: 72px; color: #fff; position: fixed; bottom: 10%; left: 30%; font-weight: bold">www.astrogame.me</a>

    <img src="{{ asset('img/avellan.png')}}" alt="" style="position: fixed; right: 0; bottom: 2%; width: 350px">
</body>
</html>
