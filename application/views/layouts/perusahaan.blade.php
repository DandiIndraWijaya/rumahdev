<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>ds</title>

    <style>
        .topnav {
            background-color: skyblue;
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Right-aligned section inside the top navigation */
        .topnav-right {
            float: right;
        }

        #app{
            display: flex
        }
        
        .left{
            width: 200px;
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
            height: 120px;
            
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
            height: 44px;
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
            height: 38px;
            font-size: 14px;
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            transition-property: block;
            transition-duration: 5s;
        }

        .show {
            display: block;
        }

    

        /* width */
        ::-webkit-scrollbar {
        width: 1px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f7f7f7;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555;
        }

    </style>
</head>
<body>
    <div class="topnav">
        <a href="#home"><font style="font-size: 28px">Rumah</font><span>dev</span></a>

        <div class="topnav-right">
          <a href="#search">Search</a>
          <a href="#about">About</a>
        </div>
    </div>
    <div id="app">
        <div class="left">
            <div class="menu">
                <center>
                <div class="profil-card">   
                        <img src="<?= base_url('assets/perusahaan/anggota/dandi.jpg') ?>" class="foto-profil" width="75" height="75">
                        <br>
                        <div class="profil-name">
                            Dandi Indra Wijaya
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
                        <button class="btn-menu">Pembayaran</button>
                    </div>
                    <div>
                        <button class="btn-menu">Transaksi</button>
                    </div>
                </center>
            </div>
        </div>

        <div class="right">
            @yield('content')
        </div>
    </div>
    <br><br>
    <div class="footer">
        this is footer
    </div>



    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>