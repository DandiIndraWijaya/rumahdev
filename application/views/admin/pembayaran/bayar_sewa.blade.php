@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Pembayaran</h3>
    <h4 class="title-admin">{{ $c_filter }}</h4>
    <font class="subfilter">
</center>
    <hr>
    <center>
        <?php
            if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
            }
        ?>
    </center>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="pembayaran">
                        <div>
                            <center>
                                <strong>
                                    <h4 style="font-weight: bold">Transaksi Sewa</h4>
                                </strong>
                            </center>
                        </div>
                    <form action="{{ base_url('index.php/admin/pembayaran/transaksi') }}" method="post">
                        <input type="text" name="metode" value="3" hidden>
                        <strong>Konsumen:</strong> <br><input type="text" class="input" name="konsumen" placeholder="Ketik id konsumen" required><br>
                        <strong>Kode Item: </strong> <br><input type="text" class="input" name="kode_item" placeholder="Ketik kode item" required><br>
                        <input class="input btn-update" style="background-color: #5bc0de;" type="submit" value="Simpan">
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="pembayaran">
                        <div>
                            <center>
                                <strong>
                                    <h4 style="font-weight: bold">Pembayaran Sewa</h4>
                                </strong>
                            </center>
                        </div>
                        <form action="{{ base_url('index.php/admin/pembayaran/bayar_sewa') }}" method="post">
                            <strong>Konsumen:</strong> <br><input type="text" class="input" name="konsumen" placeholder="Ketik id konsumen" required><br>
                            <strong>Kode Item: </strong> <br><input type="text" class="input" name="kode_item" placeholder="Ketik kode item" required><br>
                            <strong>Uang: </strong><input type="text" class="input" name="uang" placeholder="Ketik nominal uang" required><br>
                            <input class="input btn-update" style="background-color: #5cb85c;" type="submit" value="Simpan">
                        </form>
                        <hr>
                        <?php
                            if(!empty($_SESSION['kode_bukti'])){
                        ?>
                         <center>
                            <strong>
                                <h4 style="font-weight: bold">Data Berhasil Disimpan</h4>
                            </strong>
                        </center>
                            <table class="table">
                                <tr>
                                    <td>Id Konsumen : </td>
                                    <td>{{ $_SESSION['id'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Konsumen : </td>
                                    <td>{{ $_SESSION['nama_konsumen'] }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Item : </td>
                                    <td>{{ $_SESSION['kode_item'] }}</td>
                                </tr>
                                <tr>
                                    <td>Uang : </td>
                                    <td>{{ rupiah($_SESSION['uang']) }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Bukti : </td>
                                    <td>{{ $_SESSION['kode_bukti'] }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berakhir Sewa : </td>
                                    <td>{{ $_SESSION['tanggal_berakhir'] }}</td>
                                </tr>
                            </table>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>    
@endsection