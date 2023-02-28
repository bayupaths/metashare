@extends('layouts.su-admin')

@section('title')
    Metashare Super Admin - Data Customer
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
@endpush

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Customer</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
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
                    <h6 class="font-weight-medium">Data Kustomer</h6>
                    <hr class="mx-n4">
                </div>
                <div class="table-responsive">
                    <table id="customers-table" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 8%;">Nama</th>
                                <th style="width: 7%;">No Telepon</th>
                                <th style="width: 7%;">Email</th>
                                <th style="width: 6%;">Total Order</th>
                                <th style="width: 6%;">Foto Profile</th>
                                <th style="width: 7%;">Dibuat</th>
                                <th style="width: 7%;">Diedit</th>
                                <th style="width: 4%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ App\Models\Transaction::where('users_id', $customer->id)->count() ?? '0' }}</td>
                                    <td><img src="{{ Storage::url($customer->photos) ?? url('images/default-profile-image.svg') }}"
                                            alt="Foto Kustomer" width="50" height="50"></td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>{{ $customer->updated_at }}</td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ route('customer.edit', $customer->id) }}"
                                                class="btn btn-sm btn-success mr-1">
                                                <i data-feather="edit" class="feather-14" data-toggle="tooltip"
                                                    title="Edit" data-placement="top"></i>
                                            </a>
                                            <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" id="delete-customer" style="display: none"></button>
                                                <button type="button" onclick="return confirmDelete()"
                                                    class="btn btn-sm btn-danger delete-customer">
                                                    <i data-feather="trash-2" class="feather-14" data-toggle="tooltip"
                                                        title="Hapus" data-placement="top"></i>
                                                </button>
                                            </form>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Floating Button Add -->
        <div class="floating-container">
            <a href="{{ route('customer.create') }}">
                <div class="floating-button">+</div>
            </a>
        </div>
        <!-- Floating Button Add End -->
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#customers-table").DataTable();
        });
        function confirmDelete() {
            Swal.fire({
                icon : 'warning',
                title: 'Do you want to delete this customer?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                document.getElementById('delete-customer').click();
            })
        }
    </script>
@endpush
