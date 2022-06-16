<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bolang Gunung || Rekap Transaksi</title>
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
        <table align="center" style="border-collapse:collapse;">
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 50px; width:50px">
                <img src="{{ public_path("styleAdmin/production/images/logo-bolang-dark.jpg") }}" alt="" style="width: 150px; height: 150px;">
            </td>
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 200px; width:800px">
                <h2 align="center">LAPORAN TRANSAKSI BERHASIL BOLANG GUNUNG
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
                <td >:</td>
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
        <h4>Data Transaksi Berhasil Bolang Gunung</h4>
        <table border="1">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th >Kode Sewa</th>
                    <th >Nama Penyewa</th>
                    <th >Produk yang Disewa</th>
                    <th >Jumlah Sewa</th>
                    <th >Lama Sewa</th>
                    <th >Total Harga</th>
                    <th >Petugas yang Melayani</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->kode_peminjaman }}</td>
                        <td>{{ $p->member->nama }}</td>
                        <td>{{ $p->produk->nama_produk }}</td>
                        <td>{{ $p->jumlah_pinjam }}</td>
                        <td>{{ $p->lama_pinjam }} {{ $p->produk->satuan }}</td>
                        <td>Rp. {{ number_format($p->total_harga) }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <p align="right">Malang, {{ $tanggal }}<br>{{ Auth()->user()->jabatan }} Bolang
            Gunung<br><br><br><br>{{ Auth()->user()->nama }}</p>
    </div>
</body>

</html>
