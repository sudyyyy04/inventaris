@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Table</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Inventaris</th>
                                            <th>Nama Barang</th>
                                            <th>Old</th>
                                            <th>New</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($list_mutasi as $key => $mutasi)
                                            <tr>
                                                {{-- <td>{{ $loop->index + $list_barang->firstItem() }}</td> --}}
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $mutasi->barang->nomor_inventaris }}</td>
                                                <td>{{ $mutasi->barang->kategori->nama_kategori }}</td>
                                                <td>
                                                    <div>{{ $mutasi->lokasi_lama()->value('nama_lokasi') }}</div>
                                                    <div>{{ $mutasi->divisi_lama()->value('nama_divisi') }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $mutasi->lokasi_baru()->value('nama_lokasi') }}</div>
                                                    <div>{{ $mutasi->divisi_baru()->value('nama_divisi') }}</div>
                                                </td>
                                                <td>{{ $mutasi->created_at }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap: 5px">
                                                        <form action="/mutasi/{{ $mutasi->id }}/destroy" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-xs"><i
                                                            class="fa fa-trash"></i>Hapus</button></form>
                                                        <a href="#modalviewmutasibarang{{ $mutasi->id }}" data-toggle="modal"
                                                            class="btn btn-primary btn-xs">View Mutasi</a>
                                                        <a href="#modalbarang{{ $mutasi->id }}" data-toggle="modal"
                                                            class="btn btn-primary btn-xs">View Detail</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modalviewmutasibarang{{ $mutasi->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mb-0" id="exampleModalLongTitle">View
                                                                Mutasi
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" enctype="multipart/form-data"
                                                            action="/barang/{{ $mutasi->id }}/detail">
                                                            @csrf
                                                            <div class="modal-body">
    
                                                                @foreach ($mutasi->barang->mutasi as $mutasi_barang)
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Tanggal </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ $mutasi_barang->created_at }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Divisi Lama </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ \App\Models\Divisi::where('id', $mutasi_barang->divisi_lama)->value('nama_divisi') }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Divisi Baru </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ \App\Models\Divisi::where('id', $mutasi_barang->divisi_baru)->value('nama_divisi') }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Lokasi Lama </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ \App\Models\Lokasi::where('id', $mutasi_barang->lokasi_lama)->value('nama_lokasi') }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Lokasi Baru </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ \App\Models\Lokasi::where('id', $mutasi_barang->lokasi_baru)->value('nama_lokasi') }}</p>
                                                                </div>
                                                                <hr>
                                                                @endforeach
    
                                                            </div>
    
    
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalbarang{{ $mutasi->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mb-0" id="exampleModalLongTitle">View
                                                                Details
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" enctype="multipart/form-data"
                                                            action="/barang/{{ $mutasi->barang->id }}/detail">
                                                            @csrf
                                                            <div class="modal-body">
    
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Kategori </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->nama_kategori, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Nama User </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->nama_user, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Lokasi </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->nama_lokasi, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Divisi </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->nama_divisi, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Nomor Inventaris </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->nomor_inventaris, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Spesifikasi </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->spesifikasi, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Tanggal Beli </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ date('d F Y', strtotime($mutasi->barang->tanggal_beli)) }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Harga </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        Rp. {{ number_format($mutasi->barang->harga, 0, 100) }}</p>
    
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Harga Penyusutan </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        Rp.
                                                                        {{ number_format($mutasi->barang->harga_penyusutan, 0, 100) }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Keterangan </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ substr($mutasi->barang->keterangan, 0, 100) }}</p>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-start mb-4 align-items-center">
                                                                    <p style="width:150px; margin-right:30px !important"
                                                                        class="m-0">Status </p>:
                                                                    <p style=" margin-left:10px !important" class="m-0">
                                                                        {{ \App\Models\Status::where('id', $mutasi->barang->id_status)->value('nama_status') }}</p>
                                                                </div>
                                                            </div>
    
    
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="addRowModal" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mutasi Barang
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST"
                action="/mutasi/store">
                @csrf
                <div class="modal-body">
                    <div
                        class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important"
                            class="m-0">Barang </p>:
                        <select class="form-control m-0" name="id_barang"
                            style="margin-left: 15px !important" required>
                            @foreach($barang as $k)
                            <option value="{{ $k->id}}">{{ $k->kategori->nama_kategori}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div
                        class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important"
                            class="m-0">Lokasi </p>:
                        <select class="form-control m-0" name="id_lokasi"
                            style="margin-left: 15px !important" required>
                            @foreach($lokasi as $k)
                            <option value="{{ $k->id}}">{{ $k->nama_lokasi}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div
                        class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important"
                            class="m-0">Divisi </p>:
                        <select class="form-control m-0" name="id_divisi"
                            style="margin-left: 15px !important" required>
                            @foreach($divisi as $d)
                            <option value="{{ $d->id}}">{{ $d->nama_divisi}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><i
                            class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-save"></i>Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
