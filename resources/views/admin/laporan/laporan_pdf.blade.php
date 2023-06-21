<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sistem Inventaris</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <!-- <script src="/assets/js/plugin/webfont/webfont.min.js"></script> -->
    <!-- <script>
    WebFont.load({
        google: {
            "families": ["Open+Sans:300,400,600,700"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
            urls: ['/fontawesome/css/all.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script> -->

    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" media="print"
        crossorigin="anonymous">

    <style>
    body {
        -webkit-print-color-adjust: exact !important;
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
            @foreach($barang as $row)

            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $row->nama_user }}</td>
                <td>{{ $row->nama_kategori }}</td>
                <td>{{ $row->nama_lokasi }}</td>
                <td>{{ $row->nomor_inventaris }}</td>
                <td>Rp. {{ number_format($row->harga) }}</td>
                <td>{{ date('d F Y', strtotime($row->tanggal_beli)) }}</td>
                @endforeach
        </tbody>
    </table>


    <!-- <script src="/assets/js/core/jquery.3.2.1.min.js"></script> -->
    <!-- <script src="/assets/js/core/popper.min.js"></script> -->
    <!-- <script src="/assets/js/core/bootstrap.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
    <!-- jQuery UI -->
    <!-- <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script> -->
    <!-- <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> -->
    <!-- Bootstrap Toggle -->
    <!-- <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
    <!-- jQuery Scrollbar -->
    <!-- <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script> -->
    <!-- Datatables -->
    <!-- <script src="/assets/js/plugin/datatables/datatables.min.js"></script> -->
    <!-- Azzara JS -->
    <!-- <script src="/assets/js/ready.min.js"></script> -->
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <!-- <script src="/assets/js/setting-demo.js"></script> -->

</body>

</html>