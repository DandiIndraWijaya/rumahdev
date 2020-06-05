@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Perumahan Elit</h3>
    <h4 class="title-admin">{{ $c_filter }}</h4>
    <font class="subfilter">filter : 
        <a href="{{ base_url('index.php/admin/perumahanelit/semua_rumah') }}">Semua Tipe</a>,
        <a href="{{ base_url('index.php/admin/perumahanelit/tipe_elit') }}">Tipe Elit</a>, 
        <a href="{{ base_url('index.php/admin/perumahanelit/tipe_menengah') }}">Tipe Menengah</a>, 
        <a href="{{ base_url('index.php/admin/perumahanelit/tipe_murah') }}">Tipe Murah</a>
</center>
    <br>
    <font style="margin-left: 5px; color:grey">filter berdasar : {{ $subfilter }}</font>
    <form action="" method="get">
        <input type="text" placeholder="Ketik kode item">
        <input type="submit" value="Cari">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Lokasi</th>
                <th>Tipe</th>
                <th>Harga</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->kode }}</td>
                    <td>{{ $d->lokasi }}</td>
                    <td>{{ $d->tipe }}</td>
                    <td>{{ rupiah($d->harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection