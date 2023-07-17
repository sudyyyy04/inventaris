<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>Bootstrap demo</title>
    <style>
        * {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: black;
            color: white;
        }

        table tr {
            border: 1px solid black;
        }

        table tr>* {
            padding: 10px;
        }
    </style>
</head>

<body>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama User</th>
                <th scope="col">Kategori</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Nomor Inventaris</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal Beli</th>


            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($barang as $row)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama_user }}</td>
                    <td>{{ $row->nama_kategori }}</td>
                    <td>{{ $row->nama_lokasi }}</td>
                    <td>{{ $row->nomor_inventaris }}</td>
                    <td>Rp. {{ number_format($row->harga) }}</td>
                    <td>{{ date('d F Y', strtotime($row->tanggal_beli)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
