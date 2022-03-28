@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Halaman Kategori

@stop


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Kategori
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Kategori</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="kategori">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @php $no=1; @endphp
                                @foreach ($kategori as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->kode_kategori }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>

                                            <form action="{{ route('kategori.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('kategori.edit', $data->id) }}"
                                                    class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                                {{-- <a href="{{ route('kategori.show', $data->id) }}"
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
            $('#kategori').DataTable();
        });
    </script>
@endsection
