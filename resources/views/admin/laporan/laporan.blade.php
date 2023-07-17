@extends('admin.laporan.layout')

@section('laporan')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-9">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Laporan Barang</h4>
                                <div class="card-tools col d-flex justify-content-end">
                                    <a href="{{ url('/laporan/pdf?') . request()->getQueryString() }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-file-pdf">
                                            Ekspor PDF
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Nomor Inventaris</th>
                                            <th>Harga</th>
                                            <th>Tanggal Beli</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($barang as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_user }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->nama_lokasi }}</td>
                                            <td>{{ $row->nomor_inventaris }}</td>
                                            <td>Rp. {{ number_format($row->harga) }}</td>
                                            <td>{{ date('d F Y', strtotime($row->tanggal_beli)) }}</td>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Laporan Pertanggal</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('laporan') }}" method="get">
                                    <div class="form-group">
                                        <label for="tanggal_awal">Tanggal Awal</label>
                                        <input type="date" name="tanggal_awal" id="tanggal_awal"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_akhir">Tanggal Akhir</label>
                                        <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control form-control-sm" name="status" id="status">
                                            <option value="">All</option>
                                            <option value="1">Active</option>
                                            <option value="2">Scrub</option>
                                            <option value="3">Work_shop</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('sweetalert::alert')


        @endsection
