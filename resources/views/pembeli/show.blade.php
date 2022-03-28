@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Show Data Pembeli

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Pembeli</h1>
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
                <div class="card-header">Data Pembeli</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Pembeli<</label>
                        <input type="number" name="kode_pembeli" value="{{$pembeli->kode_pembeli}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" value="{{$pembeli->nama_pembeli}}" class="form-control" readonly>
                    </div>
                   <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="4" cols="150">{{$pembeli->alamat}}
                            </textarea>
                    <div class="form-group">
                        <label for=""> No Handphone</label>
                        <input type="number" name="no_hp" value="{{$pembeli->no_hp}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/pembeli')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
