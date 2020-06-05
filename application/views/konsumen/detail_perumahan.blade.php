@extends('layouts.home')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center><h3 class="title-home">{{ $title }}</h3></center>

@foreach ($perumahan as $p)
<div class="card">
    <h4 class="title-home">{{ $p->tipe }}</h4>
    <hr>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <img src="{{ base_url($p->gambar) }}" style="width: 100%; height: 250px" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            {{ $p->deskripsi }}
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <center>
                <h2>{{ rupiah($p->harga) }}</h2>
                <hr>
                    <button type="submit" class="btn-pesan" data-toggle="modal" data-target="#myModal">Pesan</button>
            </center>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="title-home">Pesan Perumahan Elit</h4>
        </div>
        <div class="modal-body">
            <h5 class="title-home">
                Tipe : {{ $p->tipe }} <br><br>
                Harga : {{ rupiah($p->harga) }}
            </h5> 
            <form action="" method="post">
                <strong style="color: grey">email : </strong><input type="text" class="input" placeholder="Ketikan email anda">
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