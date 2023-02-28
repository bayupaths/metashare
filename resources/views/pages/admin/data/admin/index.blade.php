@extends('layouts.admin')

@section('title')
    Dashboard Admin - Data Admin
@endsection

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
        <!-- *************************************************************** -->
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6 class="font-weight-medium">Data Admin</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered " style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 2%;">No</th>
                                <th style="width: 5%;">Kode</th>
                                <th style="width: 9%;">Nama</th>
                                <th style="width: 7%;">No Telepon</th>
                                <th style="width: 12%;">Alamat</th>
                                <th style="width: 7%;">Status</th>
                                <th style="width: 7%;">Dibuat</th>
                                <th style="width: 7%;">Diubah</th>
                                <th style="width: 3%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $incrementNumber = 1;
                            @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $incrementNumber++ }}</td>
                                    <td>{{ $admin->code }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->phone_number }}</td>
                                    <td>{{ $admin->address }}</td>
                                    <td>{{ $admin->status == 1 ? 'Active' : 'Non Aktive' }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($admin->created_at)) }} WIB</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($admin->updated_at)) }} WIB</td>
                                    <td>
                                        <a href="{{ route('data-admin-show', $admin->id) }}" class="btn btn-sm btn-primary mr-1"><i data-feather="search"
                                                class="feather-14" data-toggle="tooltip" title="Detail"
                                                data-placement="top"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
