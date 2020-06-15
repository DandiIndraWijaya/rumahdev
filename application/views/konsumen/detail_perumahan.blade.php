@extends('layouts.konsumen')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
    
} 

$i = 0;
?>
<center><h3 class="title-home">{{ $title }}</h3></center>
<hr>
<button data-toggle="modal" data-target="#modal" class="btn-detail" style="width: 20%; background-color: #5cb85c">Cara Transaksi</button>

@foreach ($tipe as $t)
<div class="card">
    <h4 class="title-home" style="margin: 10px">{{ $t->tipe }}</h4>
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
                <h3>Rumah Tersedia : {{ $stok[$i] }}</h3>
                <?php $i++; ?>
            </center>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="modal" role="dialog">
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
      </div>
      
    </div>
  </div>
</div>
@endsection