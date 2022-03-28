@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Laporan Transaksi

@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Transaksi
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" border="1">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pembeli</th>
                                    <th>Judul</th>
                                    <th>Jumlah Buku</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($laporan as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->pembeli->nama_pembeli }}</td>
                                        <td>{{ $data->buku->judul }}</td>
                                        <td>{{ $data->jumlah_buku }}</td>
                                        <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')

@endsection

@section('js')

@endsection
