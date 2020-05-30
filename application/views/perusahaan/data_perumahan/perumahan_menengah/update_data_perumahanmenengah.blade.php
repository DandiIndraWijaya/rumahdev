@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Update Data Perumahan Menengah</h3>
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
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="update-rumah">
                    <div>
                        <strong>
                            <font style="text-decoration: underline">Tambah Rumah</font>
                        </strong>
                    </div>
                    <form action="{{ base_url('index.php/admin/perumahanmenengah/tambah_rumah') }}" method="get">
                        <input type="text" class="input" name="kode" placeholder="Ketik kode rumah baru"><br>
                        <input type="text" class="input" name="lokasi" placeholder="Ketik alamat rumah baru"><br>
                        <div class="input">
                            Tipe Rumah: 
                            <select name="tipe">
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
                        <form action="{{ base_url('index.php/admin/perumahanmenengah/cari_rumah') }}" method="get">
                            <input type="text" class="input" name="cari" value="<?php if(!empty($kode)){
                                echo $kode;
                            } ?>" placeholder="Ketik kode rumah" required><br>
                            <input class="input btn-update" style="background-color: grey;" type="submit" value="Cari">
                        </form>

                        @if (!empty($hasil_cari))
                        <form action="{{ base_url('index.php/admin/perumahanmenengah/update') }}" method="get">
                                <input type="text" name="kode1" value="{{ $kode }}" hidden>
                                <input type="text" class="input" name="kode" value="{{ $hasil_cari['kode'] }}" required><br>
                                <input type="text" class="input" name="lokasi"value="{{ $hasil_cari['lokasi'] }}"  placeholder="Ketik alamat rumah baru" required><br>
                                <div class="input">
                                    Tipe Rumah: 
                                    <select name="tipe">
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
                    <form action="{{ base_url('index.php/admin/perumahanmenengah/hapus') }}" method="get">
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
                    <form action="{{ base_url('index.php/admin/perumahanmenengah/ubah_harga') }}" method="get">
                        @php
                            $id = 1;    
                        @endphp
                        @foreach ($tipe_rumah as $t)
                        <input type="checkbox" id="{{ $id }}" onclick="{{ $t->tipe . "()" }}">
                            {{ "Tipe " . $t->tipe }} :
                            <input class="input {{ $t->tipe }}" type="text" name="{{ "tipe_" . $t->tipe }}" value="{{ number_format($t->harga) }}" disabled required><br>
                            
                            @php
                                $id++    
                            @endphp
                        @endforeach
                        <input class="input btn-update" style="background-color: #0275d8" type="submit" value="Ubah">
                    </form>
                </div>
            </div>
        </div>
   
    </div>
    
    <script>
       function elit(){
           if(document.getElementById('1').checked == true){
                document.querySelector('.elit').disabled = false;
           }else{
            document.querySelector('.elit').disabled = true;
           }    
       }

       function murah(){
           if(document.getElementById('2').checked == true){
                document.querySelector('.murah').disabled = false;
           }else{
            document.querySelector('.murah').disabled = true;
           }    
       }
    </script>
@endsection