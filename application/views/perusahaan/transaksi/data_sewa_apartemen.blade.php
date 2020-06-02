@extends('layouts.admin')

@section('content')
<?php
 function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
} 
?>
<center >
    <h3 class="title-admin">Transaksi</h3>
    <h4 class="title-admin">{{ $c_filter }}</h4>
    <font class="subfilter">
</center>
    <br>
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kode Item</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Tanggal Berakhir Sewa</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->nama_konsumen }}</td>
                        <td>{{ $d->email}}</td>
                        <td>{{ $d->kode_item }}</td>
                        <td>{{ $d->kategori }}</td>
                        <td>{{ rupiah($d->harga) }}</td>
                        <td>{{ $d->tanggal_berakhir_sewa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection