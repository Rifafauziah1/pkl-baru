@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Pembeli

@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Pembeli
                    <a href="{{ route('pembeli.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                        Pembeli</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="pembeli">
                            <thead>
                            <tr>
                                <th>Kode Pembeli</th>
                                <th>Nama Pembeli</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            @foreach ($pembeli as $data)
                                <tr>
                                    <td>{{ $data->kode_pembeli }}</td>
                                    <td>{{ $data->nama_pembeli }}</td>
                                    <td>{{ $data->alamat }}</td>
                                     <td>0{{ $data->no_hp }}</td>
                                    <td>
                                        <form action="{{ route('pembeli.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                          <a href="{{ route('pembeli.edit', $data->id) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('pembeli.show', $data->id) }}"
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


@stop

 @section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pembeli').DataTable();
        });
    </script>
@endsection
