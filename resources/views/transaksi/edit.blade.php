@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Transaksi</h1>
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
                <div class="card-header">Data Transaksi</div>
                    <div class="card-body">
                        <form action="{{route('transaksi.update',$transaksi->id)}}" method="post">
                            @csrf
                            @method('put')
                             <div class="form-group">
                            <label for="">Masukan No Handphone</label>
                            <input type="number" name="no_hp" value="{{$pembeli->no_hp}}" class="form-control @error('no_hp') is-invalid @enderror">
                             @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="">Masukan Nama Pembeli</label>
                                <select name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror">
                                    @foreach ($pembeli as $data)
                                        <option value="{{ $data->nama_pembeli }}">
                                            {{ $data->nama_pembeli }}</option>
                                    @endforeach
                                </select>
                                @error('nama_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Judul</label>
                                <select name="judul" class="form-control @error('judul') is-invalid @enderror">
                                    @foreach ($buku as $data)
                                        <option value="{{ $data->judul }}">
                                            {{ $data->judul }}</option>
                                    @endforeach
                                </select>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="form-group">
                                <label for="">Jumlah Buku</label>
                                <input type="number" name="jumlah_buku" value="{{$transaksi->jumlah_buku}}" class="form-control @error('jumlah_buku') is-invalid @enderror">
                                @error('jumlah_buku')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                                <div class="form-group">
                                <label for="">Uang</label>
                                <input type="number" name="uang" value="{{$transaksi->uang}}" class="form-control @error('uang') is-invalid @enderror">
                                @error('uang')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
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
