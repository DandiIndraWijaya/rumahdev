@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Update Data Konsumen</h3>
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
        <div class="col-12 col-sm-12 ol-md-4 col-lg-4">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Tambah Konsumen</font>
                        </strong>
                    </div>
                    <form action="{{ base_url('index.php/admin/perumahanmenengah/tambah_rumah') }}" method="get">
                        <strong>Nama:</strong><br><input type="text" class="input" name="nama" placeholder="Ketik nama konsumen"><br>
                        <strong>Email:</strong><br><input type="text" class="input" name="email" placeholder="Ketik email konsumen"><br>
                        <strong>Alamat:</strong><br><input type="text" class="input" name="alamat" placeholder="Ketik alamat konsume"><br>
                        <strong>Tanggal Lahir:</strong><br><input type="date" class="input" name="ttl"><br>
                        <strong>Jenis Kelamin:</strong>
                        <select name="jk">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select><br>
                        <strong>Kontak:</strong><br><input type="text" class="input" name="kontak" placeholder="Ketik kontak konsumen"><br>
                        <input class="input btn-update" style="background-color: #5cb85c;" type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 ol-md-4 col-lg-4">
            <div class="card">
                <div class="update-rumah">
                        <div>
                            <strong>
                                <font style="text-decoration: underline">Perbarui Data Konsumen</font>
                            </strong>
                        </div>
                        <form action="{{ base_url('index.php/admin/perumahanmenengah/cari_rumah') }}" method="get">
                            <input type="text" class="input" name="cari" value="<?php if(!empty($kode)){
                                echo $kode;
                            } ?>" placeholder="Ketik id konsumen" required><br>
                            <input class="input btn-update" style="background-color: grey;" type="submit" value="Cari">
                        </form>

                        @if (!empty($hasil_cari))
                        <form action="{{ base_url('index.php/admin/perumahanmenengah/update') }}" method="get">
                                <input type="text" name="kode1" value="{{ $kode }}" hidden>
                                <input type="text" class="input" name="kode" value="{{ $hasil_cari['kode'] }}" required><br>
                                <input type="text" class="input" name="lokasi"value="{{ $hasil_cari['lokasi'] }}"  placeholder="Ketik alamat rumah baru" required><br>
                                <input class="input btn-update" style="background-color: #5bc0de;" type="submit" value="Ubah">
                        </form>
                        @endif
                        @if(!empty($kode))
                        <strong>
                            <center>Tidak ada konsumen dengan id {{ $kode }}</center>
                        </strong>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Hapus Konsumen</font>
                        </strong>
                    </div>
                    <form action="{{ base_url('index.php/admin/perumahanmenengah/hapus') }}" method="get">
                        <input type="text" class="input" name="kode_hapus" placeholder="Ketik id konsumen"><br>
                        <input class="input btn-update" style="background-color: #d9534f;" type="submit" value="Hapus">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection