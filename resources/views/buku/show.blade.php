@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Show Data Buku

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Buku</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Buku</div>
                <div class="card-body">
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input type="number" name="kode_buku" value="{{$buku->kode_buku}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Judul</label>
                        <input type="text" name="judul" value="{{$buku->judul}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Nama Kategori</label>
                        <input type="text" name="nama_kategori" value="{{$buku->kategori->nama_kategori}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" value="{{$buku->pengarang->nama_pengarang}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" value="{{$buku->penerbit->nama_penerbit}}" class="form-control" readonly>
                    </div>
                    <label for="deskripsi">Deskripsi:</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" cols="140" readonly>{{$buku->deskripsi}}
                            </textarea>
                    <div class="form-group">
                        <label for="">stok</label>
                        <input type="number" name="stok" value="{{$buku->stok}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Buku</label>
                        <br>
                        <img src="{{ $buku->image() }}" style="width:350px; height:350px; padding:10px;" />
                    </div>

                    <div class="form-group">
                        <a href="{{url('admin/kategori')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
