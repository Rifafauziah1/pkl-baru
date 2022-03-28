@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Pengarang

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Pengarang
                        <a href="{{ route('pengarang.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Pengarang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pengarang">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pengarang</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($pengarang as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_pengarang }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <form action="{{ route('pengarang.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                               <a href="{{ route('pengarang.edit', $data->id) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                {{-- <a href="{{ route('pengarang.show', $data->id) }}"
                                                    class="btn btn-outline-warning"><i class="fa fa-search"></i></a> --}}
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
            $('#pengarang').DataTable();
        });
    </script>
@endsection


