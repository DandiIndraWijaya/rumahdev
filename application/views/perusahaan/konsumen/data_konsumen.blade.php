@extends('layouts.admin')

@section('content')
<center >
    <h3 class="title-admin">Konsumen</h3>
    <h4 class="title-admin">{{ $c_filter }}</h4>
    <font class="subfilter">
</center>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>email</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kontak</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nama_konsumen }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->alamat_konsumen }}</td>
                    <td>{{ $d->tanggal_lahir }}</td>
                    <td>{{ $d->jenis_kelamin }}</td>
                    <td>{{ $d->kontak_konsumen }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection