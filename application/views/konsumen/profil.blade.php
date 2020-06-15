@extends('layouts.konsumen')


@section('content')
    <center>
        <h2 class="title-home">Profil</h2>
    </center>
    <div>
        <center>
            <div class="card">
                <div>
                    <img src="<?= base_url('assets/perusahaan/anggota/dandi.jpg') ?>" class="foto-profil" width="100" height="100">
                </div>
                <hr>
                <h4 style="color: grey">Id : {{ $konsumen['id'] }}</h4>
                <h4 style="color: grey">Nama : {{ $konsumen['nama_konsumen'] }}</h4>
                <h4 style="color: grey">Email : {{ $konsumen['email'] }}</h4>
                <h4 style="color: grey">Alamat : {{ $konsumen['alamat_konsumen'] }}</h4>
                <h4 style="color: grey">Tanggal Lahir : {{ $konsumen['tanggal_lahir'] }}</h4>
                <h4 style="color: grey">Jenis Kelamin : {{ $konsumen['jenis_kelamin'] }}</h4>
                <h4 style="color: grey">Kontak : {{ $konsumen['kontak_konsumen'] }}</h4>
            </div>
        </center>
    </div>

    <div>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Item</th>
                        <th>Metode Pembayaran</th>
                        <th>Kategori</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($transaksi as $t)
                        <tr>
                            <td>{{ $t->kode_item }}</td>
                            <td>{{ $t->metode }}</td>
                            <td>{{ $t->kategori }}</td>
                            <td>{{ $t->tanggal_dibuat }}</td>
                            <td><a href=""><button  style="background-color: #5cb85c;" class="input btn-update" >Detail</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection