@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            @foreach ($tipe as $t)
            <div class="card">
                <br>
                <center>
                    <h5>{{ $t->tipe }}</h5>
                </center>
                <hr>
                <img src="{{ base_url($t->gambar) }}" height="200px">
               
                <div style="background: whitesmoke">
                    <br>
                    <center>
                        <h5>Deskripsi</h5>
                    </center>
                    <h6>
                        {{ $t->deskripsi }}
                    </h6> 
                    <br>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <br>
                <center>
                    <h4>Update Deskripsi dan Gambar</h4>
                </center>
                <hr>
                <form method="post">
                    <select style="margin-left: 10px" name="tipe" id="">
                        <option value="elit">Tipe Elit</option>
                        <option value="elit">Tipe Menengah</option>
                        <option value="elit">Tipe Murah</option>
                    </select>
                    <br>
                    <strong style="margin-left: 10px">Upload gambar :</strong><input type="file" name="fileToUpload" class="input"><br>
                    <textarea id="summernote" name="editordata"></textarea>
                    <center>
                        <input  class="input btn-update" style="background-color: #5cb85c;" type="submit" value="simpan">
                    </center>
                    
                </form>
            </div>
        </div>
    </div>
@endsection


