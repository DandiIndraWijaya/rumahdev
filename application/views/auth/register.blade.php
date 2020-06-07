@extends('layouts.auth')

@section('content')
<div class="card" style="margin-top: 100px;">
    <center><h3 class="title-home">Daftar</h3></center>
    <hr>
    <?php 
        if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
        }
    ?>
    <form action="{{ base_url('index.php/authentication/register') }}" method="POST">
        <div class="input-fields">
            <label for="email" class="label">Tulis e-mail</label><br>
            <input type="email" id="email" name="email" class="input" value="<?= set_value('email'); ?>" placeholder="Ketik alamat e-mail" required>

        </div>

        <div class="input-fields">
            <label for="" class="label">Tulis password anda</label>
            <input type="password" name="password" class="input" placeholder="Ketik password" required>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="input-fields">
            <label for="" class="label">Tulis ulang password anda</label>
            <input type="password" name="password2" class="input" placeholder="Ketik password" required>
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <center>
            <input type="submit" class="btn-login" value="Daftar">
            <br>
            <br>
        </center>
    </form>
</div>
@endsection