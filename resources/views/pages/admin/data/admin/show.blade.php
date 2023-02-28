@extends('layouts.admin')

@section('title')
    Metashare Admin - Detail Admin
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Admin</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('data-admin-index') }}" class="text-link">Data Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow-sm px-3 py-2">
            <table class="table">
                <tbody>
                    <tr class="table-borderless">
                        <th scope="row" class="text-primary col-4">Data Admin</th>
                        <td></td>
                    </tr>
                    <tr class="table-borderless">
                        <th scope="row">Kode</th>
                        <td>{{ $admin->code }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">No Telepon</th>
                        <td>{{ $admin->phone_number }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td>{{ $admin->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{ $admin->status == 1 ? 'Active' : 'Non Active' }}</td>
                    </tr>
                </tbody>
            </table>
            <hr class="mt-n3">
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="font-weight-medium">Riwayat Pengerjaan Undangan</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%;">#</th>
                                <th style="width: 5%;">Kode</th>
                                <th style="width: 9%;">Tanggal</th>
                                <th style="width: 8%;">Nama Kustomer</th>
                                <th style="width: 7%;">Kategori</th>
                                <th style="width: 8%;">Nama Model</th>
                                <th style="width: 12%;">Keterangan</th>
                                <th style="width: 7%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($processing as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->transaction_detail->code }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d F Y') ?? '' }}</td>
                                    <td>{{ $item->transaction_detail->transaction->user->name  }}</td>
                                    <td>{{ $item->transaction_detail->model_invitation->category->name }}</td>
                                    <td>{{ $item->transaction_detail->model_invitation->name }}</td>
                                    <td>{{ $item->transaction_detail->invitation_status }}</td>
                                    <td>{{ $item->transaction_detail->active_status }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3 ml-4">
                <a href="{{ route('data-admin-index') }}" class="btn btn-sm btn-warning px-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection
