@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Edit Data Penerbit

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data penerbit</h1>
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
                <div class="card-header">Data penerbit</div>
                    <div class="card-body">
                        <form action="{{route('penerbit.update',$penerbit->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Nama Penerbit</label>
                                <input type="text" name="nama_penerbit" value="{{$penerbit->nama_penerbit}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama_penerbit')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                          <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="4" cols="140">{{$penerbit->alamat}}
                            </textarea>
                              <div class="form-group">
                                <label for="">Masukan Email</label>
                                <input type="text" name="email" value="{{$penerbit->email}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                              <div class="form-group">
                            <label for="">Masukan No Telepon</label>
                            <input type="text" name="no_tlp"  value="{{$penerbit->no_tlp}}" class="form-control @error('no_tlp') is-invalid @enderror">
                             @error('no_tlp')
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
