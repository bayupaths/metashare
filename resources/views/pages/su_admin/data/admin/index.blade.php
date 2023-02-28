@extends('layouts.su-admin')

@section('title')
    Metashare Super Admin - Data Admin
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
@endpush


@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Admin</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master data</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="font-weight-medium">Data Admin</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="tableAdmin" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 12%;">Email</th>
                                <th style="width: 9%;">Nama</th>
                                <th style="width: 9%;">No Telepon</th>
                                <th style="width: 12%;">Alamat</th>
                                <th style="width: 7%;">Status</th>
                                <th style="width: 9%;">Dibuat</th>
                                <th style="width: 9%;">Diubah</th>
                                <th style="width: 9%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Floating Button Add -->
        <div class="floating-container">
            <a href="{{ route('admin.create') }}">
                <div class="floating-button">+</div>
            </a>
        </div>
        <!-- Floating Button Add End -->
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <script>
        var dataTable = $("#tableAdmin").dataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: "{!! url()->current() !!}",
            },
            filter: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'name',
                    name: 'nama',
                },
                {
                    data: 'phone_number',
                    name: 'phone_number',
                },
                {
                    data: 'address',
                    name: 'address',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ],
            order: [
                [1, 'asc']
            ],
            drawCallback: function(settings) {
                feather.replace();
            },
            responsive: true,
            bDeferRender: true,
        });

        $("#tableAdmin").on('click', '.delete-admin', function(event) {
            event.preventDefault();
            var id = $(event.currentTarget).attr('admin-id');
            var url = '{{ route("admin.destroy", ":id") }}';
            url = url.replace(':id', id);
            Swal.fire({
                title: "Hapus Data Admin",
                text: "Anda yakin ingin menghapus data admin ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        }
                    });
                    $.ajax({
                        method: "delete",
                        url: url,
                        beforeSend: function() {
                            swal.fire({
                                imageUrl: '{!! url("icons/rolling.png") !!}',
                                title: "Menghapus Data Admin",
                                text: "Silahkan Tunggu",
                                showConfirmButton: false,
                                allowOutsideClick: false,
                            });
                        },
                        success: function(data) {
                            if (data.success == false) {
                                swal.fire({
                                    icon: "error",
                                    title: "Menghapus Data Admin Gagal",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                swal.fire({
                                    icon: "success",
                                    title: "Menghapus Data Admin Berhasil",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                dataTable.ajax.reload(null, false);
                            }
                        },
                    })
                }
            })
        });

        function confirmDelete() {
            Swal.fire({
                icon: 'warning',
                title: 'Do you want to delete this admin?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                document.getElementById('delete-admin').click();
            })
        }
    </script>
@endpush
