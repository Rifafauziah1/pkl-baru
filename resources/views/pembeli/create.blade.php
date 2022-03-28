@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    Tambah Data Pembeli

@stop

@section('content')

@section('header')
 {{-- <!-- css untuk select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <!-- cdn bootstrap4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
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
                <div class="card-header">Data Pembeli</div>
                <div class="card-body">
                   <form action="{{route('pembeli.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror">
                             @error('nama_pembeli')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <label>Nama Pembeli</label>
                        <select id="nama_pembeli" name="nama_pembeli"  class="form-control @error('nama_pembeli') is-invalid @enderror">
                            <option value="nama_pembeli"></option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bogor">Bogor</option>
                            <option value="Depok">Depok</option>
                            <option value="Tangerang">Tangerang</option>
                            <option value="Bekasi">Bekasi</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Surabaya">Surabaya</option>
                        </select> --}}
                        </div>
                        <label for="alamat">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="4" cols="140">
                            </textarea>
                        <div class="form-group">
                            <label for="">Masukan Nomor Handphone</label>
                            <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror">
                             @error('no_hp')
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


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
           integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
           crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
        <!-- js untuk select2  -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#nama_pembeli").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select"
                });

            });
        </script>

@endsection
