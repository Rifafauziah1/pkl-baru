@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Tambah Data Pengarang

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data Kategori</h1>
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
                <div class="card-header">Data Pengarang</div>
                <div class="card-body">
                   <form action="{{route('pengarang.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Nama Pengarang</label>
                            <input type="text" name="nama_pengarang" class="form-control @error('nama_pengarang') is-invalid @enderror">
                             @error('nama_pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="4" cols="140">
                            </textarea>

                        <div class="form-group">
                            <label for="">Masukan Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
