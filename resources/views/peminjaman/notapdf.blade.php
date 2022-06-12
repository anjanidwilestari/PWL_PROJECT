<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bolang Gunung || Cetak Nota</title>
    <style>
        * {
            box-sizing: border-box;
            font-size: 18px;
            font-family: Times New Roman;
        }

        body {
            background-color: #f8f8f8;
        }

        .margin {
            background-color: #fff;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 1px 1px 0 #ccc;
            padding: 40px 60px;
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
                <h2 align="center">TANDA TERIMA TRANSAKSI BOLANG GUNUNG
                    <br>
                    Jl. Soekarno Hatta
                    <br>
                    Telepon: 08811890773, Email : bolanggunungexample@gmail.com
                </h2>
            </td>
        </table>
        <hr>
        <br>

        <table>
            <tr>
                <td scope="col" width="60px">Kode Sewa</td>
                <td scope="row" width="50px">:</td>
                <td scope="row">{{$peminjaman->kode_peminjaman}}</td>
            </tr>
            <tr>
                <td scope="col" width="60px">Nama Penyewa</td>
                <td scope="row" width="50px">:</td>
                <td scope="row">{{$peminjaman->member->nama}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td scope="col">:</td>
                <td>{{$peminjaman->member->alamat}}</td>
            </tr>
        </table>
        <br><br>
        <table border="1">
            <thead>
                <tr>
                    <th width="120px">Produk yang Disewa</th>
                    <th width="60px">Harga Satuan</th>
                    <th width="60px">Jumlah yang Disewa</th>
                    <th width="60px">Durasi Sewa</th>
                    <th width="60px">Total Harga</th>
                    <th width="60px">Status</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $peminjaman->produk->nama_produk }}</td>
                        <td>Rp. {{ $peminjaman->harga_satuan }}</td>
                        <td>{{ $peminjaman->jumlah_pinjam }}</td>
                        <td>{{ $peminjaman->lama_pinjam }} {{ $peminjaman->produk->satuan }}</td>
                        <td>Rp. {{ $peminjaman->total_harga }}</td>
                        <td>{{ $peminjaman->status }}</td>
                    </tr>
            </tbody>
        </table>
        <br>
        <p align="right">Malang, {{ $tanggal }}<br>Hormat Kami,<br><br><br><br>{{ Auth()->user()->nama }}<br>{{ Auth()->user()->jabatan }} Bolang Gunung</p>
    </div>
</body>

</html>
