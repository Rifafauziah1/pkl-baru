@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Buku

@stop

@section('content')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Buku</h1>
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
                    <div class="card-header">
                        Data Buku
                        <a href="{{ route('buku.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Buku</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="buku">
                                <thead>
                                    <tr>
                                        <th>Kode Buku</th>
                                        <th>Judul</th>
                                        <th>Nama Kategori</th>
                                        <th>Nama Pengarang</th>
                                        <th>Nama Penerbit</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($buku as $data)
                                    <tr>
                                        <td>{{ $data->kode_buku}}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->kategori->nama_kategori }}</td>
                                        <td>{{ $data->pengarang->nama_pengarang }}</td>
                                        <td>{{ $data->penerbit->nama_penerbit }}</td>
                                        <td>{{ $data->stok }} Buku</td>
                                        <td>{{ $data->harga }}</td>
                                        <td><img src="{{ $data->image() }}" alt="" style="width:150px; height:150px;"
                                                alt="Cover"></td>
                                        <td>
                                            <form action="{{ route('buku.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('buku.edit', $data->id) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('buku.show', $data->id) }}"
                                                    class="btn btn-outline-warning"><i class="fa fa-search"></i></a>
                                                <button type="submit"
                                                    class="btn btn-outline btn-sm btn-outline-danger delete-confirm"><i class="fas fa-window-close"></i></button>
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#buku').DataTable();
        });
    </script>
@endsection
