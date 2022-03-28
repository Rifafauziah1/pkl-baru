@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Show Data Pengarang

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Pengarang</h1>
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
                    <div class="form-group">
                        <label for=""> Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" value="{{$pengarang->nama_pengarang}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Alamat</label>
                        <input type="text" name="alamat" value="{{$pengarang->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="text" name="email" value="{{$pengarang->email}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/pengarang')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
