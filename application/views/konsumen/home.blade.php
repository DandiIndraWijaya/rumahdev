@extends('layouts.konsumen')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
    <center>
        <h3 class="title-home">Pilihan Tempat Tinggal untuk Anda</h3>
    </center>
    <?php 
        if(!empty($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
    ?>
    <hr>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <center><h4 class="title-home">Perumahan Menengah</h4></center>
                    <img src="{{ base_url('assets/app_images/perumahan.jpg') }}" style="width: 100%; height: 250px" alt="">
                    <hr>
                    <h5 class="title-home">Perumahan dengan fasilitas yang sangat berkualitas</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perummenengah as $menengah)
                                <tr>
                                    <td>{{ $menengah->tipe }}</td>
                                    <td>{{ rupiah($menengah->harga) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <center>
                        <a href=""><button class="btn-detail">Lihat Detail</button></a>
                    </center>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <center><h4 class="title-home">Perumahan Elit</h4></center>
                    <img src="{{ base_url('assets/app_images/perumahan.jpg') }}" style="width: 100%; height: 250px" alt="">
                    <hr>
                    <h5 class="title-home">Perumahan dengan fasilitas yang sangat berkualitas</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perumelit as $elit)
                                <tr>
                                    <td>{{ $elit->tipe }}</td>
                                    <td>{{ rupiah($elit->harga) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <center>
                        <a href="{{ base_url('index.php/perumahan/perumahan_elit') }}"><button class="btn-detail">Lihat Detail</button></a>
                    </center>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <center><h4 class="title-home">Apartemen</h4></center>
                    <img src="{{ base_url('assets/app_images/perumahan.jpg') }}" style="width: 100%; height: 250px" alt="">
                    <hr>
                    <h5 class="title-home">Perumahan dengan fasilitas yang sangat berkualitas</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Beli</td>
                                <td>{{ rupiah($apartemen['harga_beli']) }}</td>
                            </tr>
                            <tr>
                                <td>Sewa Pertahun</td>
                                <td>{{ rupiah($apartemen['sewa_pertahun']) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <center>
                        <a href=""><button class="btn-detail">Lihat Detail</button></a>
                    </center>
                </div>
            </div>
        </div>
@endsection