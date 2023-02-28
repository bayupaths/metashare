@extends('layouts.su-admin')

@section('title')
    Dashboard Super Admin Metashare
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled">Dashboard</li>
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
                                <h2 class="font-weight-medium text-black">{{ $admin }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Admin Aktif</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus" class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <h2 class="font-weight-medium text-black">{{ $customer }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Kustomer
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="users" class="feather-icon"></i></span>
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
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Order Masuk</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="shopping-cart"
                                    class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div class="total">
                            <h2 class="font-weight-medium text-black">{{ $invitation }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Model Undangan</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="server" class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Penugasan Pengerjaan Undangan Kepada Admin -->
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="font-weight-medium">Penugasan Pengerjaan Undangan Terbaru Kepada Admin</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 5%;">Kode</th>
                                <th style="width: 10%;">Tanggal</th>
                                <th style="width: 11%;">Nama Kustomer</th>
                                <th style="width: 7%;">Kategori</th>
                                <th style="width: 9%;">Nama Model</th>
                                <th style="width: 8%;">Admin</th>
                                <th style="width: 11%;">Keterangan</th>
                                <th style="width: 6%;">Status</th>
                                <th style="width: 4%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BLsag0414</td>
                                <td>10-10-2022</td>
                                <td>Eren Yeager</td>
                                <td>Spesial</td>
                                <td>Gun And Roses</td>
                                <td>Obito</td>
                                <td>Belum</td>
                                <td>Aktif</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
