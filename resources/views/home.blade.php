@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <center><b>SELAMAT DATANG DITOKO KAMI</b></center><br>

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('kategori.index') }}">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ DB::table('kategori')->count() }}</h3>
                            <p>Total Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion far far-fw fad fa-list-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('buku.index') }}">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ DB::table('buku')->count() }}</h3>
                                <p>Total Buku</p>
                            </div>
                            <div class="icon">
                                <i class="ion far fa-address-book"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('transaksi.index') }}">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ DB::table('transaksi')->count() }}</h3>
                            <p>Total Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion far fa-address-card"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('penerbit.index') }}">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ DB::table('penerbit')->count() }}</h3>
                            <p>Total Penerbit</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas fa-users"></i>
                        </div>
                    </div>

                </a>
                <!-- ./col -->


            </div>
                                <div class="col-xl-12">
                    <div id="home">
                    </div>

                    </div>
        </div>
        @endsection

        @section('css')

        @endsection

        @section('js')
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>

        // Create the chart
Highcharts.chart('home', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Grafik Transaksi Buku Yang Terjual'
    },
    xAxis: {
        categories: {!! json_encode($chart) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyaknya Jumlah Buku'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color.};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Buah</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Buku Yang Terjual',
        data: {!! json_encode($jumlah_buku) !!}

    }]
});
        </script>
        @endsection



