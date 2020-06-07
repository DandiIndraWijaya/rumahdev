<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <title>{{ $title }}</title>
</head>
<body>
    <div class="topnav">
        <span class="open-slidecss">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30" >
                    <path d="M0,5 30,5" stroke="grey" stroke-width="5" />
                    <path d="M0,14 30,14" stroke="grey" stroke-width="5" />
                    <path d="M0,23 30,23" stroke="grey" stroke-width="5" />
                </svg>
            </a>
        </span>
    <div class="logo">
        <a href="#home"><font style="font-size: 28px">Rumah</font><span>dev</span></a>
    </div>
        <div class="topnav-right">
            <a href="{{ base_url() }}">Beranda</a>
        </div>
    </div>


    <div class="container">
        <div style="margin: auto; width:50%;">
            @yield('content')
        </div>
    </div>


    <div class="footer">
        this is footer
    </div>
</body>
</html>

