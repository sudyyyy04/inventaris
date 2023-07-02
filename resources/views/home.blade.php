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
                                            <th>Name</th>
                                            <th>Dari</th>
                                            <th>Ke</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($listMutasi as $mutasi)
                                            <tr>
                                                <td>{{ $mutasi->barang }}</td>
                                                <td>{{ $mutasi->dari }}</td>
                                                <td>{{ $mutasi->ke }}</td>
                                                <td>
                                                    <a href="#modalEditMutasi{{ $mutasi->id }}" data-toggle="modal"
                                                         class="btn btn-primary btn-xs"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                    <form action="/mutasi/{{ $mutasi->id }}/destroy" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs"><i
                                                        class="fa fa-trash"></i>Hapus</button></form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modalEditMutasi{{ $mutasi->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Mutasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" enctype="multipart/form-data"
                                                            action="/mutasi/{{ $mutasi->id }}/update">
                                                            @csrf
                                                            <div class="modal-body">

                                                                <input type="hidden" value="{{ $mutasi->id }}" name="id"
                                                                    required>

                                                                <div class="form-group">
                                                                    <label>Barang</label>
                                                                    <input type="text" value="{{ $mutasi->barang }}"
                                                                        class="form-control" name="barang"
                                                                        placeholder="Barang ..." required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Dari</label>
                                                                    <input type="text" value="{{ $mutasi->dari }}"
                                                                        class="form-control" name="dari"
                                                                        placeholder="Dari ..." required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ke</label>
                                                                    <input type="text" value="{{ $mutasi->ke }}"
                                                                        class="form-control" name="ke"
                                                                        placeholder="Ke ..." required>
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

<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Mutasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/mutasi/store">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" class="form-control" name="barang" placeholder="Barang ..." required>
                    </div>
                    <div class="form-group">
                        <label>Dari</label>
                        <input type="text" class="form-control" name="dari" placeholder="Dari ..." required>
                    </div>
                    <div class="form-group">
                        <label>Ke</label>
                        <input type="text" class="form-control" name="ke" placeholder="Ke ..." required>
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
