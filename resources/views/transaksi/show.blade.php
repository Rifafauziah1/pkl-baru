@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Show Data Transaksi

@stop

@section('content')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Transaksi</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Transaksi</div>
                <div class="card-body">
                      <div class="form-group">
                        <label for=""> Tanggal Beli</label>
                        <input type="date" name="tgl_beli" value="{{$transaksi->tgl_beli}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" value="{{$transaksi->pembeli->nama_pembeli}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul" value="{{$transaksi->buku->judul}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah Buku</label>
                        <input type="text" name="jumlah_buku" value="{{$transaksi->jumlah_buku}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" value="{{$transaksi->harga}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" name="total" value="{{$transaksi->total}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <a href="{{url('admin/transaksi')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
