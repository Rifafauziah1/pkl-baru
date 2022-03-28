@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Penerbit

@stop

@section('content')    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Penerbit
                        <a href="{{ route('penerbit.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Penerbit</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="penerbit">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Penerbit</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($penerbit as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_penerbit }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->no_tlp }}</td>
                                        <td>
                                            <form action="{{ route('penerbit.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                              <a href="{{ route('penerbit.edit', $data->id) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                {{-- <a href="{{ route('penerbit.show', $data->id) }}"
                                                    class="btn btn-outline-warning"><i class="fa fa-search"></i></a> --}}
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
            $('#penerbit').DataTable();
        });
    </script>
@endsection

