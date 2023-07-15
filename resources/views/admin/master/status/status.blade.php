@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Status</h4>
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
                        <a href="#">Status</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Status</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#modalAddStatus">
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
                                            <th>Nama Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($status as $row)

                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_status }}</td>

                                            <td>
                                                <a href="#modalEditStatus{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="#modalHapusStatus{{ $row->id }}" data-toggle="modal"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalEditStatus{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Add Status
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" enctype="multipart/form-data"
                                                        action="/status/{{ $row-> id }}/update">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <input type="hidden" value="{{ $row->id }}" name="id"
                                                                required>

                                                            <div class="form-group">
                                                                <label>Nama Status</label>
                                                                <input type="text" value="{{ $row->nama_status }}"
                                                                    class="form-control" name="nama_status"
                                                                    placeholder="Nama Status ..." required>
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

                                        <div class="modal fade" id="modalHapusStatus{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus
                                                            Status
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="GET" enctype="multipart/form-data"
                                                        action="/status/{{ $row->id }}/destroy">
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

<div class="modal fade" id="modalAddStatus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="/status/store">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama status</label>
                        <input type="text" class="form-control" name="nama_status" placeholder="Nama Status ..."
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