@extends('admin.auditing.layout')

@section('audit')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-9">


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Riwayat</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $auditList as $index => $item )
                                    <tr>
                                        <td>
                                            {{ $auditListPagination->firstItem() + $loop->index}}
                                        </td>


                                        <td>
                                            {{ $item-> description }}

                                        </td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>

                                            <a href="#" data-toggle="modal" data-target="#modalaudit"
                                                class="btn btn-primary btn-xs" id="view_detail"
                                                data-url="{{ $item->id }}">View</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center m-3">
                            <p class="m-0">
                                Menampilkan {{ count($auditList) }} dari
                                {{ $auditListPagination->total() }}
                                Data
                            </p>
                            {{ $auditListPagination->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalaudit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-start mb-4 align-items-center">
                    <p style="width:200px; margin-right:30px !important" class="m-0">Nama Editor </p>:
                    <p style=" margin-left:3px !important" id="nama_user" class="m-0"></p>
                </div>
                <div id="old_values"></div>
                <div id="new_values"></div>
            </div>
        </div>
    </div>
</div>


@include('sweetalert::alert')


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $("a#view_detail").click(function() {
        $.ajax({
            url: "http://127.0.0.1:8000/audit/detail/" + $(this).data('url'),
            success: function(result) {
                console.log(result);
                $("#nama_user").html(
                    result.name
                )
                $('#old_values').empty();
                const id = ["id_kategori", "id", "id_lokasi"];

                if (result.old_nama_kategori) {
                    $('#old_values').append(`
                        <div class="d-flex justify-content-start mb-4 align-items-center">
                            <p style="width:200px; margin-right:30px !important" class="m-0"> nama kategori lama</p>
                            <p class="m-0">: ${result.old_nama_kategori} </p>
                        </div>
                        `)
                }
                for (const [key, value] of Object.entries(result.old_values)) {
                    if (
                        !id.includes(key)
                    ) {
                        $('#old_values').append(`
                        <div class="d-flex justify-content-start mb-4 align-items-center">
                            <p style="width:200px; margin-right:30px !important" class="m-0">${key} lama</p>
                            <p class="m-0">: ${key == 'tanggal_beli' ? result.tanggal_beli : value} </p>
                        </div>
                        `)
                    }

                }
                $('#new_values').empty();
                if (result.new_nama_kategori) {
                    $('#new_values').append(`
                        <div class="d-flex justify-content-start mb-4 align-items-center">
                            <p style="width:200px; margin-right:30px !important" class="m-0"> nama kategori baru</p>
                            <p class="m-0">: ${result.new_nama_kategori} </p>
                        </div>
                        `)
                }
                for (const [key, value] of Object.entries(result.new_values)) {
                    if (
                        !id.includes(key)
                    ) {
                        $('#new_values').append(`
                        <div class="d-flex justify-content-start mb-4 align-items-center">
                            <p style="width:200px; margin-right:30px !important" class="m-0 ">${key} baru</p>
                            <p class="m-0">: ${key == 'tanggal_beli' ? result.tanggal_beli : value} </p>
                        </div>
                        `)
                    }

                }
            }
        });
    });
});
</script>
