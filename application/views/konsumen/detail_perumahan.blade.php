@extends('layouts.konsumen')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center><h3 class="title-home">{{ $title }}</h3></center>

@foreach ($tipe as $t)
<div class="card">
    <h4 class="title-home">{{ $t->tipe }}</h4>
    <hr>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <img src="{{ base_url($t->gambar) }}" style="width: 100%; height: 250px" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            {{ $t->deskripsi }}
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <center>
                <h2>{{ rupiah($t->harga) }}</h2>
                <hr>
                    <button type="submit" class="btn-pesan" data-toggle="modal" data-target="{{ '#id' . $t->id }}">Pesan</button>
            </center>
        </div>
    </div>
</div>
<div class="modal fade" id="{{ 'id' . $t->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="title-home">Pesan Perumahan Elit</h4>
        </div>
        <div class="modal-body">
            <h5 class="title-home">
                Tipe : {{ $t->tipe }} <br><br>
                Harga : {{ rupiah($t->harga) }}
            </h5> 
            <form action="{{ base_url('index.php/perumahan/pesan') }}" method="post">
                <input type="text" name="tabel" value="{{ $tabel }}" hidden>
                <input type="text" name="perumahan" value="{{ $perumahan }}" hidden>
                <input type="text" name="tipe" value="{{ $t->tipe }}" hidden>
                <strong style="color: grey">Pilih kode rumah : </strong>
                <select name="kode">
                    @foreach ($kode as $k)
                        <?php
                            if($k->id_tipe == $t->id){
                        ?>
                             <option value="{{ $k->kode }}">{{ $k->kode }}</option>   
                        <?php
                            }
                        ?>
                    @endforeach
                </select>
                <br>
                <strong style="color: grey">email : </strong><input type="email" name="email" class="input" placeholder="Ketikan email anda">
                <p>Anda harus menerima balasan email dari kami untuk melanjutkan transaksi</p>
        
            <center>
                <input type="submit" class="btn-pesan" value="Pesan" style="background-color: #ffc107">
            </center>
        
        </form>
      </div>
      
    </div>
  </div>
</div>
@endforeach

@endsection