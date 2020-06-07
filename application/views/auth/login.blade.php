@extends('layouts.auth')
@section('content')
    <div class="card" style="margin-top: 100px;">
        <center><h3 class="title-home">Login</h3></center>
        <hr>
        <?php 
            if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
        ?>
        <form action="" method="POST">
            <div class="input-fields">
                <label for="email" class="label">Tulis e-mail</label><br>
                <input type="email" id="email" name="email" class="input" value="<?= set_value('email'); ?>" placeholder="Ketik alamat e-mail" required>

            </div>

            <div class="input-fields">
                <label for="" class="label">Tulis password anda</label>
                <input type="password" name="password" class="input" placeholder="Ketik password" required>
            </div>

            <center>
                <div class="lupa">
                    <a href="#">Lupa Password?</a>
                </div>
                <input type="submit" class="btn-login" value="Masuk">
                <br>
                <br>
                <div class="akun">
                    Belum memiliki akun? <a href="<?= base_url() ?>index.php/authentication/register"> Daftar sekarang</a>
                </div>
                <br>
            </center>
        </form>
    </div>
@endsection