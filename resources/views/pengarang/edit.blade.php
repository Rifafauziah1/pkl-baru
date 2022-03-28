@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Edit Data Pengarang

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data pengarang</h1>
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
                <div class="card-header">Data pengarang</div>
                    <div class="card-body">
                        <form action="{{route('pengarang.update',$pengarang->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Nama Pengarang</label>
                                <input type="text" name="nama_pengarang" value="{{$pengarang->nama_pengarang}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama_pengarang')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                         <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="4" cols="140">{{$pengarang->alamat}}
                            </textarea>
                               <div class="form-group">
                                <label for="">Masukan Email</label>
                                <input type="text" name="email" value="{{$pengarang->email}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('email')
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
