@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Update Data Perumahan Elit</h3>
</center>
    <hr>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Tambah Rumah</font>
                        </strong>
                    </div>
                    <form action="" method="post">
                        <input type="text" class="input" name="kode" placeholder="Ketik kode rumah baru"><br>
                        <input type="text" class="input" name="lokasi" placeholder="Ketik alamat rumah baru"><br>
                        <div class="input">
                            Tipe Rumah: 
                            <select name="" id="">
                                @foreach ($tipe_rumah as $t)
                                    <option value="{{ $t->id }}">{{ $t->tipe }}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <input class="input btn-update" style="background-color: #5cb85c;" type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="update-rumah">
                        <div>
                            <strong>
                                <font style="text-decoration: underline">Perbarui Data Rumah</font>
                            </strong>
                        </div>
                        <form action="{{ base_url('index.php/admin/perumahanelit/cari_rumah') }}" method="get">
                            <input type="text" class="input" name="cari" value="<?php if(!empty($kode)){
                                echo $kode;
                            } ?>" placeholder="Ketik kode rumah"><br>
                            <input class="input btn-update" style="background-color: grey;" type="submit" value="Cari">
                        </form>

                        @if (!empty($hasil_cari))
                        <form action="{{ base_url('index.php/admin/perumahanelit/update') }}" method="post">
                                <input type="text" class="input" name="kode" value="{{ $hasil_cari['kode'] }}"><br>
                                <input type="text" class="input" name="lokasi"value="{{ $hasil_cari['lokasi'] }}"  placeholder="Ketik alamat rumah baru"><br>
                                <div class="input">
                                    Tipe Rumah: 
                                    <select name=""  id="">
                                        @foreach ($tipe_rumah as $t)
                                            <option
                                            @if ($t->id == $hasil_cari['id_tipe'])
                                                {{ 'selected' }}
                                            @endif 
                                            value="{{ $t->id }}">{{ $t->tipe }}</option>
                                        @endforeach
                                    </select><br>
                                </div>
                                <input class="input btn-update" style="background-color: #5bc0de;" type="submit" value="Ubah">
                        </form>
                        @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Hapus Rumah</font>
                        </strong>
                    </div>
                    <form action="" method="post">
                        <input type="text" class="input" name="kode_hapus" placeholder="Ketik kode rumah"><br>
                        <input class="input btn-update" style="background-color: #d9534f;" type="submit" value="Hapus">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Ubah Harga Tipe</font>
                        </strong>
                    </div>
                    <form action="" method="post">
                        @foreach ($tipe_rumah as $t)
                            {{ "Tipe " . $t->tipe }} :
                            <input class="input" type="text" name="tipe_elit" value="{{ number_format($t->harga) }}" disabled required><br>
                        @endforeach
                        <input class="input btn-update" style="background-color: #0275d8" type="submit" value="Ubah">
                    </form>
                </div>
            </div>
        </div>
        
        

   
    </div>
    

@endsection