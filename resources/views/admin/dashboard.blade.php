@extends('adminLayouts.main')

@section('title')
    Dashboard
@endsection

@section('dashboard', 'active')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Transaksi</span>
                <div class="count">{{ $peminjamans }}</div>
                <span class="count_bottom"><i class="green">{{ $pinjambulanini }}</i> Total transaksi Bulan {{ \Carbon\Carbon::now()->format('F') }}</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Belum Kembali</span>
                <div class="count red">{{ $belumkembali }}</div>
                <span class="count_bottom">{{ \Carbon\Carbon::now()->format('F') }} : <i class="red">{{ $pinjambulanini }}</i> Peminjaman</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Transaksi Selesai</span>
                <div class="count green">{{ $sudahkembali }}</div>
                <span class="count_bottom">{{ \Carbon\Carbon::now()->format('F') }} : <i class="green">{{ $pinjambulanini }}</i> Peminjaman</span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>Pemasukan Lain</span>
                <div class="count">Rp{{ number_format($biayalain) }}</div>
                <span class="count_bottom">Diambil dari Biaya Denda Transaksi</span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Pemasukan</span>
                <div class="count blue">Rp{{ number_format($pemasukans) }}</div>
                <span class="count_bottom">Diambil dari Nominal Sewa Transaksi</span>
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">
                    <div class="col-md-9">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="high-chart-transaksi" class="demo-placeholder"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="high-chart-produk"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
    </div>
    <!-- /page content -->
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('high-chart-transaksi', {

            title: {
                text: {!! json_encode($bulan) !!},
            },

            subtitle: {},

            yAxis: {
                title: {
                    text: 'Jumlah Peminjaman'
                }
            },

            xAxis: {
                categories: {!! json_encode($hari) !!},
                crosshair: true
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">Tanggal {point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },

            series: [{
                name: 'Peminjaman',
                data: {!! json_encode($peminjam) !!}
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
    <script>
        Highcharts.chart('high-chart-produk', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Produk Paling Banyak Disewa'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Produk',
                colorByPoint: true,
                data: {!! json_encode($produk) !!}
            }]
        });
        console.log({!! json_encode($produk) !!});
    </script>
@endpush
