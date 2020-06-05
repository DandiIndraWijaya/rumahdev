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
                    <th>Lama Angsuran</th>
                    <th>Uang Muka</th>
                    <th>Nominal Pembayaran</th>
                    <th>Angsuran ke</th>
                    <th>Telah Bayar</th>
                    <th>Sisa Bayar</th>
                    <th>Tenggat Waktu</th>
                    <th>Aksi</th>
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
                        <td>{{ $d->lama_angsuran }}</td>
                        <td>{{ rupiah($d->uang_muka ) }}</td>
                        <td>{{ rupiah($d->nominal_pembayaran) }}</td>
                        <td>{{ $d->angsuran_ke }}</td>
                        <td>{{ rupiah($d->telah_bayar) }}</td>
                        <td>{{ rupiah($d->sisa_bayar) }}</td>
                        <td>{{ $d->tenggat_waktu }}</td>
                        <td> <th><form action="" method="post">
                            <input class="input btn-update" style="background-color: #d9534f;" type="submit" value="Non Aktifkan">    
                        </form></th></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection