@extends('layouts.su-admin')

@section('title')
    Metashare Super Admin - Tambah Data Admin
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Data Admin</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('admin.index') }}" class="text-link">Data Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow px-3">
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data" class="mt-2">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukan Nama" id="nama" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="notlp">No Telepon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="Masukan No Telepon" id="notlp" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="alamat"
                            placeholder="Masukan Alamat">{!! old('address') !!}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukan Password" id="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="roles">Roles <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="roles" id="roles" class="form-control  @error('roles') is-invalid @enderror">
                            <option value="">Select Role</option>
                            <option value="ADMIN">Admin</option>
                            <option value="SUPER_ADMIN">Super Admin</option>
                        </select>
                        @error('roles')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="flex mt-3 mb-4">
                    <button type="submit" class="btn btn-sm btn-warning px-3 py-2 mr-3">Simpan</button>
                    <button type="reset" class="btn btn-sm btn-secondary px-3 py-2">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
