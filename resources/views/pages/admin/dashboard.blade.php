@extends('layouts.admin')

@section('title')
    Dashboard Admin
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled">Dashboard Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <div class="d-inline-flex align-items-center">
                                <h2 class="font-weight-medium text-black">0</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Undangan <br> Yang
                                Belum Dikerjakan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fa fa-file-circle-xmark fa-xl"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <h2 class="font-weight-medium text-black">0</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Undangan <br> Dalam
                                Proses Pengerjaan
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fa-solid fa-file-pen fa-xl"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <div class="d-inline-flex align-items-center">
                                <h2 class="font-weight-medium text-black">0</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Undangan <br> Sudah
                                Dikerjakan
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fa-solid fa-file-circle-check fa-xl"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <h2 class="font-weight-medium text-black">0</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Kustomer Aktif</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fa-solid fa-user-check fa-xl"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="font-weight-medium">Tugas Terbaru Pengerjaan Undangan Dari Super Admin</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="table-penugasan" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 5%;">Kode</th>
                                <th style="width: 7%;">Tanggal</th>
                                <th style="width: 11%;">Nama Kustomer</th>
                                <th style="width: 6%;">Kategori</th>
                                <th style="width: 9%;">Nama Model</th>
                                <th style="width: 6%;">Admin</th>
                                <th style="width: 11%;">Keterangan</th>
                                <th style="width: 6%;">Status</th>
                                <th style="width: 8%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
