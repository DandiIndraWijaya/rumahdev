@extends('layouts.perusahaan')

@section('content')
<div class="filter">
    <button class="btn-filter">Rincian</button>
    <button class="btn-filter">Semua Rumah</button>
    <button class="btn-filter">Masih Tersedia</button>
    <button class="btn-filter">Sudah Dimiliki</button>
    <button class="btn-filter">Edit</button>
</div>
<center >
    <h3 style="color: grey; font-weight: bold">Perumahan Elit</h3>
    <h4 style="color: grey; font-weight: bold">Semua Rumah</h4>
    <font style="color: grey">filter : <a href="">Rumah Elit</a> <a href="">Rumah Menengah</a> <a href="">Rumah Murah</a></font>
</center>
    <font style="margin-left: 5px; color:grey">filter berdasar : -</font>
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
                    <td>{{ $d->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection