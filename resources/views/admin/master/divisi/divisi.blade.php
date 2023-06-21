@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Divisi</h4>
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
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Divisi</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Divisi</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddDivisi">
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
                                            <th>Nama Divisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($divisi as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_divisi }}</td>

                                            <td>
                                                <a href="#modalEditDivisi{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="#modalHapusDivisi{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalEditDivisi{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Add Divisi
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" enctype="multipart/form-data"
                                                        action="/divisi/{{ $row-> id }}/update">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="hidden" value="{{ $row->id }}" name="id"
                                                                required>

                                                            <div class="form-group">
                                                                <label>Nama Divisi</label>
                                                                <input type="text" value="{{ $row->nama_divisi }}"
                                                                    class="form-control" name="nama_divisi"
                                                                    placeholder="Nama Divisi ..." required>
                                                            </div>


                                                            <!-- <div class="form-group">
                                                                <label>Level</label>
                                                                <select class="form-control" name="level" required>
                                                                    <option value="" hidden="">-- Pilih Level --
                                                                    </option>
                                                                    <option
                                                                        <?php if ($row['level'] == "admin") {echo "selected";}?>
                                                                        value="admin">Admin</option>
                                                                    <option
                                                                        <?php if ($row['level'] == "user") {echo "selected";}?>
                                                                        value="user">User</option>
                                                                </select>
                                                            </div> -->
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

                                        <div class="modal fade" id="modalHapusDivisi{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus
                                                            Divisi
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="GET" enctype="multipart/form-data"
                                                        action="/divisi/{{ $row->id }}/destroy">
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

<div class="modal fade" id="modalAddDivisi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/divisi/store">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama divisi</label>
                        <input type="text" class="form-control" name="nama_divisi" placeholder="Nama Divisi ..."
                            required>
                    </div>


                    <!-- <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required>
                            <option value="" hidden="">-- Pilih Level -- </option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div> -->
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

@include('sweetalert::alert')
@endsection