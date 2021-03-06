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
        <a href="{{ base_url('index.php/admin/perumahanmenengah/semua_rumah_dimiliki') }}">Semua Tipe</a>,
        <a href="{{ base_url('index.php/admin/perumahanmenengah/tipe_elit_dimiliki') }}">Tipe Elit</a>, 
        <a href="{{ base_url('index.php/admin/perumahanmenengah/tipe_murah_dimiliki') }}">Tipe Murah</a>
</center>
    <br>
    <font style="margin-left: 5px; color:grey">filter berdasar : {{ $subfilter }}</font>
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