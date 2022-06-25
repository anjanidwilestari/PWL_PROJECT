<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bolang Gunung || Rekap Transaksi Pengembalian</title>
    <style>
        * 
        body {
            background-color: #f8f8f8;
        }

        .margin {
            background-color: #fff;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td:first-child {
            width: 30%;
        }

        td {
            padding: 10px;
        }

        h4 {
            font-size: 25px;
        }

        h1 {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="margin">
        <table align="right" style="border-collapse:collapse;">
            <td style="border-bottom:2px solid #000; text-align: center; width: 50px; width:50px">
                <img src="{{ public_path("styleAdmin/production/images/logo-bolang-dark.jpg") }}" alt="" style="width: 150px; height: 150px;">
            </td>
            <td style="border-bottom:2px solid #000; text-align: center; width: 200px; width:800px">
                <h2 align="center">LAPORAN PENGEMBALIAN BOLANG GUNUNG
                    <br>
                    Jl. Soekarno Hatta
                    <br>
                    Telepon: +6285231404775, Email : bolanggunungexample@gmail.com
                </h2>
            </td>
        </table>
        <hr>
        <br>

        <table>
            <tr>
                <td width="60px">Ditujukan Kepada</td>
                <td width="50px">:</td>
                <td >Founder Bolang Gunung</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td scope="col">:</td>
                <td>Jl. Soekarno Hatta</td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td>+6285231404775</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>bolanggunungexample@gmail.com</td>
            </tr>
        </table>
        <br><br>
        <h4>Data Transaksi Bolang Gunung</h4>
        <table border="1">
            <thead>
                <tr>
                    <th width="60px">No</th>
                    <th >Kode Sewa</th>
                    <th >Status</th>
                    <th >Keterangan</th>
                    <th >Denda</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalian as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->peminjaman->kode_peminjaman }}</td>
                        <td>{{ $p->status_kembali }}</td>
                        <td>
                        @if (($p->keterangan) == null)
                            -
                        @else
                            {{ $p->keterangan }}
                        @endif
                        </td>
                        <td>
                            @if (($p->denda) == null)
                                -
                            @else
                                Rp{{ number_format($p->denda) }}
                            @endif
                        </td>
                        <td>{{ $p->created_at->isoFormat('D MMMM Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <p align="right">Malang, {{ $tanggal }}<br>{{ Auth()->user()->role }} Bolang
            Gunung<br><br><br><br>{{ Auth()->user()->nama }}</p>
            <br><br><br>
    </div>
</body>

</html>
