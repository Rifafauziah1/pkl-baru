@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Show Data Penerbit

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Penerbit</h1>
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
                <div class="card-header">Data Penerbit</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" value="{{$penerbit->nama_penerbit}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Alamat</label>
                        <input type="text" name="alamat" value="{{$penerbit->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="text" name="email" value="{{$penerbit->email}}" class="form-control" readonly>
                    </div>
                        <div class="form-group">
                        <label for="">No Telepon</label>
                        <input type="text" name="no_tlp" value="{{$penerbit->no_tlp}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/penerbit')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
