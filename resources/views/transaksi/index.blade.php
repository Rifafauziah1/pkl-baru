@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Transaksi

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Transaksi
                    <a href="{{ route('transaksi.create') }}" style="margin-top: 25px" class="btn btn-sm btn-outline-primary float-right">Tambah
                        Transaksi</a>

                            <form action="{{ url('admin/transaksi/export')}}" method="post">
                                @csrf
                                <button style="float: right; margin-right: 15px" class="btn btn-sm btn-outline-success" type="submit">Export Excel </button>
                            </form>

                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="transaksi">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Pembeli</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Pembeli</th>
                                <th>Judul</th>
                                {{-- <th>Harga</th> --}}
                                <th>Jumlah Buku</th>
                                <th>Total</th>
                                <th>Uang</th>
                                <th>Kembalian</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no=1; @endphp
                            @foreach ($transaksi as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->kode_pembeli }}</td>
                                    <td>{{ $data->tgl_beli }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->buku->judul }}</td>
                                    {{-- <td>{{ $data->buku->harga }}</td> --}}
                                    <td>{{ $data->jumlah_buku }}</td>
                                    {{-- <td>Rp. {{ number_format ($data->harga, 0, ',', '.') }}</td> --}}
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format ($data->uang, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($data->kembalian, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            {{-- <a href="{{ route('transaksi.edit', $data->id) }}"
                                                class="btn btn-outline-info">Edit</a> --}}
                                            <a href="{{ route('transaksi.show', $data->id) }}"
                                                    class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
                                                <button type="submit" class="btn btn-outline btn-sm btn-outline-danger delete-confirm"><i class="fas fa-window-close"></i></button>
                                        </form>
                                    </td>
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
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#transaksi').DataTable();
        });
    </script>
@endsection
