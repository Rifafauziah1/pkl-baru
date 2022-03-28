@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Tambah Data Transaksi
     <!-- css untuk select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <!-- cdn bootstrap4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@stop

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Transaksi</div>
                    <div class="card-body">
                       <form action="{{route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                                <label for="">Masukan Tanggal Beli</label>
                                <input type="date" name="tgl_beli" class="form-control @error('tgl_beli') is-invalid @enderror">
                                 @error('tgl_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                 @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                            <label for="">Masukan Nama Pembeli</label>
                            <select name="pembeli_id" class="form-control @error('pembeli_id') is-invalid @enderror">
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}">{{$data->nama_pembeli}}</option>
                                @endforeach
                            </select>
                           @error('id_pembeli')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                         <div class="form-group">
                                <label for="">Judul Buku</label>
                                <select name="buku_id" class="form-control" id="judul" data-judul="{{ $buku }}">
                                    <option value="0">Pilih Judul</option>
                                    @foreach ($buku as $data)
                                        <option value="{{ $data->id }}">{{ $data->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        {{-- <div class="form-group">
                            <label for="">Masukan Judul</label>
                            <select name="buku_id" id="judul" class="form-control @error('buku_id') is-invalid @enderror">
                                @foreach($buku as $data)
                                <option value="{{$data->id}}">{{$data->judul}}</option>
                                @endforeach
                            </select>
                            @error('buku_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div> --}}
                                 {{-- <div class="form-group">
                                    <label for="">Harga Buku</label>
                                    <select name="harga" class="form-control @error('harga') is-invalid @enderror">
                                        @foreach($buku as $data)
                                        <option value="{{$data->id}}">{{$data->harga}}</option>
                                        @endforeach
                                    </select>
                                    @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                            <div class="form-group">
                                <label for="">Masukan Jumlah Buku</label>
                                <input type="number" name="jumlah_buku" id="jumlah" class="form-control @error('jumlah_buku') is-invalid @enderror">
                                 @error('jumlah_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Total Bayar</label>
                                <input type="number" readonly class="form-control" id="harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Uang</label>
                                <input type="number" name="uang" class="form-control @error('uang') is-invalid @enderror">
                                 @error('uang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group mt-3">
                                <a href="#" class="addtransaksi btn btn-success" style="float: right;"><i
                                        class="fa fa-plus"></i> Tambah Buku</a> --}}
                            </div>
                            <div class="transaksi"></div>
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


@stop

@section('css')

@stop

@section('js')
    <script>
        let judul = document.querySelector('#judul')
        let harga = document.querySelector('#harga')
        let Jumlah = document.querySelector('#jumlah_buku')
        let total = 0;

        judul.addEventListener('change', function () {
           let findJudul = JSON.parse(judul.dataset.judul).find(item => item.id == judul.value)

            total += findJudul.harga
            harga.setAttribute("value",total)
        })

        jumlah.addEventListener('input', function(event){
            total *= event.target.value
            harga.setAttribute("value",total)
        })

    </script>
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addtransaksi').on('click', function() {
            addtransaksi();
        });

        function addtransaksi() {
            var transaksi =
            '<div<div class="form-group"><label for="">Masukan Judul</label><select name="buku_id" class="form-control @error('buku_id') is-invalid @enderror"> @foreach($buku as $data)<option value="{{$data->id}}">{{$data->judul}}</option>@endforeach</select>@error('buku_id') <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span> @enderror </div><div class="form-group"><label for="">Masukan Jumlah Buku</label><input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror"> @error('jumlah_buku')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>@enderror </div><div class="form-group mt-3"><a href="#" class="remove btn btn-danger" style="float: right;">Hapus</a></div></div>';
             $('.transaksi').append(transaksi);
        };

          $('.remove').live('click', function() {
            $(this).parent().parent().remove();
        });
         </script> --}}
@endsection
