<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bolang Gunung || Rekap Produk</title>
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
                <h2 align="center">LAPORAN PRODUK BOLANG GUNUNG
                    <br>
                    Jl. Soekarno Hatta, Malang
                    <br>
                    Telepon: +6285231404775, Email : bolanggunungexample@gmail.com
                </h2>
            </td>
        </table>
        <hr>
        <br>

        <table>
            <tr>
                <td scope="col" width="60px">Ditujukan Kepada</td>
                <td scope="row" width="50px">:</td>
                <td scope="row">Founder Bolang Gunung</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td scope="col">:</td>
                <td>Jl. Soekarno Hatta, Malang</td>
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
        <h4>Data Produk Bolang Gunung</h4>
        <table border="1">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th width="100px">Kode Produk</th>
                    <th width="120px">Nama Produk</th>
                    <th width="100px">Kategori</th>
                    <th width="120px">Harga</th>
                    <th width="120px">Ditambahkan Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $pr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pr->kode_produk }}</td>
                        <td>{{ $pr->nama_produk }}</td>
                        <td>{{ $pr->kategoriproduk->nama_kategori }}</td>
                        <td>Rp{{ number_format($pr->harga) }}/{{$pr->satuan}}</td>
                        <td>{{ \Carbon\Carbon::parse($pr->created_at)->format('d F Y') }}</td>
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
