@extends('admin.master.barang.layout')

@section('barang')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">



            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="page-title mb-auto">Data Barang</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddBarang">
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
                                            <th>Kategori</th>
                                            <th>Nama User</th>
                                            <th>Lokasi</th>
                                            <th>Divisi</th>
                                            <th>Nomor Inventaris</th>
                                            <th>Harga</th>
                                            <th>Tanggal Beli</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($barang as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->nama_user }}</td>
                                            <td>{{ $row->nama_lokasi }}</td>
                                            <td>{{ $row->nama_divisi }}</td>
                                            <td>{{ $row->nomor_inventaris }}</td>
                                            <td>Rp. {{ number_format($row->harga) }}</td>
                                            <td>{{ date('d F Y', strtotime($row->tanggal_beli)) }}</td>


                                            <td>
                                                <a href="#modalEditBarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="#modalHapusBarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                <a href="#modalbarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs">View</a>
                                                <a href="#modalMutasiBarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Mutasi</a>
                                                <a href="#modalviewmutasibarang{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs">View Mutasi</a>
                                            </td>





                                        </tr>
                                        <div class="modal fade" id="modalbarang{{ $row->id }}" tabindex="-1"
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
                                                        action="/workshop/{{ $row->id }}/detail">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Kategori </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->nama_kategori, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Nama User </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->nama_user, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Lokasi </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->nama_lokasi, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Divisi </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->nama_divisi, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Nomor Inventaris </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->nomor_inventaris, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Spesifikasi </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->spesifikasi, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Tanggal Beli </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ date('d F Y', strtotime($row->tanggal_beli)) }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Harga </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    Rp. {{ number_format($row->harga, 0, 100) }}</p>

                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Harga Penyusutan </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    Rp.
                                                                    {{ number_format($row->harga_penyusutan, 0, 100) }}
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Keterangan </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ substr($row->keterangan, 0, 100) }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Status </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ \App\Models\Status::where('id', $row->id_status)->value('nama_status') }}</p>
                                                            </div>
                                                        </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalviewmutasibarang{{ $row->id }}" tabindex="-1"
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
                                                        action="/workshop/{{ $row->id }}/detail">
                                                        @csrf
                                                        <div class="modal-body">

                                                            @foreach ($row->mutasi as $mutasi)
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Tanggal </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ $mutasi->created_at }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Divisi Lama </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ \App\Models\Divisi::where('id', $mutasi->divisi_lama)->value('nama_divisi') }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Divisi Baru </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ \App\Models\Divisi::where('id', $mutasi->divisi_baru)->value('nama_divisi') }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Lokasi Lama </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ \App\Models\Lokasi::where('id', $mutasi->lokasi_lama)->value('nama_lokasi') }}</p>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Lokasi Baru </p>:
                                                                <p style=" margin-left:10px !important" class="m-0">
                                                                    {{ \App\Models\Lokasi::where('id', $mutasi->lokasi_baru)->value('nama_lokasi') }}</p>
                                                            </div>
                                                            <hr>
                                                            @endforeach

                                                        </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalMutasiBarang{{ $row->id }}" tabindex="-1"
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
                                                        action="/workshop/{{ $row-> id }}/update">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="hidden" value="{{ $row->id }}" name="id"
                                                                required>
                                                            <input type="hidden" value="1" name="mutasi"
                                                                required>
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

                                        <div class="modal fade" id="modalEditBarang{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" enctype="multipart/form-data"
                                                        action="/workshop/{{ $row-> id }}/update">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="hidden" value="{{ $row->id }}" name="id"
                                                                required>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Kategori </p>:
                                                                <select class="form-control m-0" name="id_kategori"
                                                                    style="margin-left: 15px !important" required>
                                                                    <option value="{{ $row->id_kategori }}">
                                                                        {{ $row->nama_kategori }}
                                                                    </option>
                                                                    @foreach($kategori as $k)
                                                                    <option value="{{ $k->id}}">{{ $k->nama_kategori}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Nama User </p>:
                                                                <input type="text" value="{{ $row->nama_user }}"
                                                                    class="form-control m-0" name="nama_user"
                                                                    style="margin-left: 15px !important"
                                                                    placeholder="Nama Barang ..." required>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Lokasi </p>:
                                                                <select class="form-control m-0" name="id_lokasi"
                                                                    style="margin-left: 15px !important" required>
                                                                    <option value="{{ $row->id_lokasi }}">
                                                                        {{ $row->nama_lokasi }}
                                                                    </option>
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
                                                                    <option value="{{ $row->id_divisi }}">
                                                                        {{ $row->nama_divisi }}
                                                                    </option>
                                                                    @foreach($divisi as $d)
                                                                    <option value="{{ $d->id}}">{{ $d->nama_divisi}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Nomor Inventaris </p>:
                                                                <input type="text" value="{{ $row->nomor_inventaris }}"
                                                                    class="form-control m-0" name="nomor_inventaris"
                                                                    style="margin-left: 15px !important"
                                                                    placeholder="Nomor inventaris ..." required>
                                                            </div>

                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Spesifikasi </p>:
                                                                <input type="text" value="{{ $row->spesifikasi }}"
                                                                    class="form-control m-0" name="spesifikasi"
                                                                    style="margin-left: 15px !important"
                                                                    placeholder="Spesifikasi ..." required>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Tanggal Beli </p>:
                                                                <input type="text" value="{{ $row->tanggal_beli }}"
                                                                    class="form-control m-0" name="tanggal_beli"
                                                                    style="margin-left: 15px !important"
                                                                    placeholder="Tanggal Beli ..." required>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:40px !important"
                                                                    class="m-0">Harga </p>:
                                                                <span class="input-group-text"
                                                                    style="margin-left: 15px !important"
                                                                    id="basic-addon1">Rp</span>
                                                                <input type="number" value="{{ $row->harga }}"
                                                                    class="form-control m-0" name="harga"
                                                                    style="margin-left: 5px !important"
                                                                    placeholder="Harga ..." required>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:40px !important"
                                                                    class="m-0">Harga Penyusutan </p>:
                                                                <span class="input-group-text"
                                                                    style="margin-left: 15px !important"
                                                                    id="basic-addon1">Rp</span>
                                                                <input type="number"
                                                                    value="{{ $row->harga_penyusutan }}"
                                                                    class="form-control m-0" name="harga_penyusutan"
                                                                    style="margin-left: 5px !important"
                                                                    placeholder="Harga Penyusutan ...">
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Keterangan </p>:
                                                                <input type="text" value="{{ $row->keterangan }}"
                                                                    class="form-control m-0" name="keterangan"
                                                                    style="margin-left: 15px !important"
                                                                    placeholder="Keterangan ..." required>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-start mb-4 align-items-center">
                                                                <p style="width:150px; margin-right:30px !important"
                                                                    class="m-0">Status </p>:
                                                                <select class="form-control m-0" name="id_status"
                                                                    style="margin-left: 15px !important" required>
                                                                    @foreach($status as $d)
                                                                    <option value="{{ $d->id}}" {{ $d->id == $row->id_status ? 'selected' : '' }}>{{ $d->nama_status}}
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

                                        <div class="modal fade" id="modalHapusBarang{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="GET" enctype="multipart/form-data"
                                                        action="/workshop/{{ $row->id }}/destroy">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="hidden" value="{{ $row->id }}" name="id"
                                                                required>

                                                            <div class="form-group">
                                                                <h4>Apakah Anda Ingin Menghapus Data Ini ? </h4>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"><i class="fa fa-undo"></i>
                                                                    Close</button>
                                                                <button type="submit" class="btn btn-danger"><i
                                                                        class="fa fa-trash"></i> Hapus</button>
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

<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/workshop/store">
                @csrf
                <div class="modal-body">

                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Kategori </p>:
                        <select class="form-control m-0" name="id_kategori" style="margin-left: 15px !important"
                            required>
                            <option value="" hidden=""> -- Pilih Kategori -- </option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id}}">{{ $k->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Nama User </p>:
                        <input type="text" class="form-control m-0" name="nama_user"
                            style="margin-left: 15px !important" placeholder="Nama User ..." required>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Lokasi </p>:
                        <select class="form-control m-0" name="id_lokasi" style="margin-left: 15px !important" required>
                            <option value="" hidden=""> -- Pilih Lokasi -- </option>
                            @foreach($lokasi as $p)
                            <option value="{{ $p->id}}">{{ $p->nama_lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Divisi </p>:
                        <select class="form-control m-0" name="id_divisi" style="margin-left: 15px !important" required>
                            <option value="" hidden=""> -- Pilih Divisi -- </option>
                            @foreach($divisi as $d)
                            <option value="{{ $d->id}}">{{ $d->nama_divisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Nomor Inventaris</p>:
                        <input type="text" class="form-control m-0" name="nomor_inventaris"
                            style="margin-left: 15px !important" placeholder="Nomor Inventaris ..." required>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Spesifikasi</p>:
                        <input type="text" class="form-control m-0" name="spesifikasi"
                            style="margin-left: 15px !important" placeholder="Spesifikasi ..." required>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Tanggal Beli</p>:
                        <input type="date" class="form-control m-0" name="tanggal_beli"
                            style="margin-left: 15px !important" placeholder="Tanggal Beli ..." required>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:40px !important" class="m-0">Harga </p>:
                        <span class="input-group-text" style="margin-left: 15px !important" id="basic-addon1">Rp</span>
                        <input type="number" class="form-control m-0" name="harga" style="margin-left: 5px !important"
                            placeholder="Harga ..." required>
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:40px !important" class="m-0">Harga Penyusutan </p>:
                        <span class="input-group-text" style="margin-left: 15px !important" id="basic-addon1">Rp</span>
                        <input type="number" class="form-control m-0" name="harga_penyusutan"
                            style="margin-left: 5px !important" placeholder="Harga Penyusutan ...">
                    </div>
                    <div class="d-flex justify-content-start mb-4 align-items-center">
                        <p style="width:150px; margin-right:30px !important" class="m-0">Keterangan</p>:
                        <input type="text" class="form-control m-0" name="keterangan"
                            style="margin-left: 15px !important" placeholder="Keterangan ..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-undo">
                        </i>Close
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}")
@endif
</script> -->





@include('sweetalert::alert')


@endsection
