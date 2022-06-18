@extends('adminLayouts.main')

@section('title')
    Dashboard
@endsection

@section('dashboard', 'active')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        
        <div class="row top_tiles">
              <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" onclick="location.href='{{ route('peminjaman.index') }}';">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-exchange"></i></div>
                  <div class="count">{{ $peminjamans }}</div>
                  <h3>Transaksi</h3>
                  <p>{{ $pinjambulanini }} Total transaksi Bulan {{ \Carbon\Carbon::now()->isoFormat('MMMM') }}</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" onclick="location.href='{{ route('peminjaman.belumkembali') }}';">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-upload"></i></div>
                  <div class="count">{{ $belumkembali }}</div>
                  <h3>Dipinjam</h3>
                  <p>Dari {{$pinjambulanini}} Peminjaman {{ \Carbon\Carbon::now()->isoFormat('MMMM') }}</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-2 col-md-2 col-sm-6 col-xs-12" onclick="location.href='{{ route('peminjaman.dikembalikan') }}';">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-download"></i></div>
                  <div class="count">{{ $sudahkembali }}</div>
                  <h3>Kembali</h3>
                  <p>Dari {{$pinjambulanini}} Peminjaman {{ \Carbon\Carbon::now()->isoFormat('MMMM') }}</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="location.href='{{ route('pengembalian.index') }}';">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-plus"></i></div>
                  <div class="count">Rp{{ number_format($biayalain) }}</div>
                  <h3>Pemasukan Lain</h3>
                  <p>Diambil dari Biaya Denda Transaksi</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="location.href='{{ route('peminjaman.index') }}';">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count">Rp{{ number_format($pemasukans) }}</div>
                  <h3>Pemasukan Utama</h3>
                  <p>Diambil dari Nominal Sewa Transaksi</p>
                </div>
              </div>
            </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">
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
