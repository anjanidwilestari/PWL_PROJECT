<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bolang Gunung || Rekap Kategori Produk</title>
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
                <h2 align="center">LAPORAN KATEGORI PRODUK BOLANG GUNUNG
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
        <h4>Data Kategori Bolang Gunung</h4>
        <table border="1">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th >Kategori Produk</th>
                    <th >Deskripsi</th>
                    <th >Ditambahkan Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoriproduk as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>{{ $k->deskripsi }}</td>
                        <td>{{ \Carbon\Carbon::parse($k->created_at)->format('d F Y') }}</td>
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
