<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">

    <title>{{ $tab }}</title>

    <style>
        .topnav {
            background-color: skyblue;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 6px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Right-aligned section inside the top navigation */
        .topnav-right {
            float: right;
            padding: 6px 16px;
        }

        .main{
            margin-top: 70px;
        }
        
        .left{
            width: 100%;
        }
        
        .right{
            width: 100%;
        }

        .side-navcss{
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 2;
            top: 0;
            left: -250px;
            background-color: white;
            overflow-x: hidden;
            transition: 0.3s;
        }

        .lapisan2{
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 1;
            background-color: black;
            opacity: 0.5;
        
        }

        .content{
            height: 100%;
            border: gainsboro 1px solid;
            margin: 10px 10px;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
        }

        .profil-card{
            font-size: 12px;
            width: 95%;
            color: grey;
            margin-bottom: 12px;
            border-bottom: gainsboro 1px solid;
            border-top: gainsboro 1px solid;
            border-right: gainsboro 1px solid;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
            height: 150px;
            
        }

        .profil-name{
            margin-top: 10px;
            margin-bottom: 8px;
        }

        .foto-profil{
            border-radius: 50%;
            margin-top: 8px;
        }

        .menu{
            width: 200px;
            height: 100%;
            border-right: gainsboro 1px solid;
            margin-top: 10px;
            padding: 8px;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
        }

        .submenu{
            display: block;
        }

        #smenu{
            display: none;
            transition: 0.5;
        }

        .btn-menu{
            width: 95%;
            text-align: center;
            color: white;
            height: 28px;
            border: none;
            outline: none;
            margin-bottom: 5px;
            cursor: pointer;
            background-color: #ffc107;
            font-size: 14px;
            transition: width 0.5s, height 0.5s;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
        }

        .btn-menu:hover{
            width: 100%;
            height: 40px;
            font-size: 19px;
            font-weight: bold;
        }

        .btn-submenu{
            width: 90%;
            text-align: center;
            color: white;
            height: 26px;
            border: none;
            outline: none;
            margin-bottom: 5px;
            cursor: pointer;
            background-color: skyblue;
            font-size: 14px;
            transition: width 0.5s, height 0.5s;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
            font-size: 12px;
        }

        .btn-submenu:hover{
            width: 100%;
            height: 32px;
            font-size: 14px;
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            transition-property: block;
            transition-duration: 5s;
        }
        .dropdown-content1 {
            display: none;
            transition-property: block;
            transition-duration: 5s;
        }

        .show1 {
            display: block;
        }

        .footer{
            margin-top: 100px;
            overflow: hidden;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: skyblue;
            color: white;
            text-align: center;
        }

        @media(max-width:900px){
            .menu{
                display: none;
            }

            .logo{
                display: none;
            }
        }

        @media(min-width:900px){
            .open-slidecss{display: none;}
            .garis{display: none;}
        }

        .btn-filter{
            background-color: gainsboro;
            color: grey;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: width 0.5s, height 0.5s;
        }

        .btn-filter:hover{
            font-size: 14px;
        }

        .update-rumah{
            margin: 5px;
            color: grey;
            margin-bottom: 5px;
        }

        .btn-update{
            color: white;
            font-size: 14px;
            transition: width 0.3s, height 0.3s;
            height: 25px;
            width: 70px;
            border: none;
            outline: none;
            border-radius: 8px;
        }

        .btn-update:hover{
            font-size: 16px;
            height: 30px;
            width: 75px;
        }

        .input{
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .card{
            margin: 20px;
            border-bottom: gainsboro 1px solid;
            border-top: gainsboro 1px solid;
            border-right: gainsboro 1px solid;
            border-radius: 8px;
            box-shadow: 0px 5px 5px #ccc;
        }

        .pembayaran{
            margin: 5px;
            color: grey;
            margin-bottom: 5px;
        }

        .btn-detail{
            background-color: #ffc107;
            font-weight: bold;
            color: white;
            width: 90%;
            outline: none;
            border: none;
            padding: 5px;
            transition: width 0.3s, height 0.3s;
            border-radius: 8px;
        }

        .btn-detail:hover{
            width: 100%;
            padding: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-pesan{
            background-color: #5cb85c;
            font-weight: bold;
            color: white;
            width: 90%;
            font-size: 14px;
            outline: none;
            border: none;
            padding: 5px;
            transition: width 0.3s, height 0.3s;
            border-radius: 8px;
        }

        .btn-pesan:hover{
            width: 100%;
            padding: 8px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="lapisan2">

    </div>
    
    <div class="container">
            <div id="side-menucss" class="side-navcss">
                <div>
                    <center>
                    <div style="margin-bottom: 8px; background-color: skyblue">
                        <a style="text-decoration: none;" href="#home"><font style="font-size: 28px; color: white">Rumah<span>dev</span></font></a>
                    </div>
                    <div class="profil-card">
                        <br>
                        Administrator <br>   
                            <img src="<?= base_url('assets/perusahaan/anggota/dandi.jpg') ?>" class="foto-profil" width="75" height="75">
                            <br>
                            <div class="profil-name">
                                Dandi Indra Wijaya
                                <hr>
                                Administrator
                            </div>
                    </div>
                        <div>
                            <button class="btn-menu dropbtn" onclick="myFunction()">Produk</button>
                        </div>
                            <div id="myDropdown" class="dropdown-content">
                                <button class="btn-submenu">Perumahan Elit</button>
                                <button class="btn-submenu">Perumahan Menengah</button>
                                <button class="btn-submenu">Apartemen</button>
                            </div>
                        <div>
                            <button class="btn-menu">Konsumen</button>
                        </div>
                        <div>
                            <button class="btn-menu">Pembayaran</button>
                        </div>
                        <div>
                            <button class="btn-menu">Transaksi</button>
                        </div>
                    </center>
                </div>
            </div>
            
            <div class="main">
                @yield('content')
            </div>
    </div>
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
          <a href="#search">Search</a>
          <a href="#about">About</a>
        </div>
    </div>
    <div class="footer">
        this is footer
    </div>
        
    <script>
        function openSlideMenu() {
        document.getElementById('side-menucss').style.left = '0';
        document.querySelector('#lapisan2').classList.add('lapisan2');

    }

    const lapisan2 = document.querySelector('#lapisan2');

    function closeSlideMenu() {
        document.getElementById('side-menucss').style.left = '-250px';
        lapisan2.classList.remove('lapisan2');
    }

    lapisan2.addEventListener('click', function() {
        document.getElementById('side-menucss').style.left = '-250px';
        lapisan2.classList.remove('lapisan2');
    })

      


        
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

