@extends('layouts.su-admin')

@section('title')
    Metashare Super Admin - Update Data Admin
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Update Data Admin</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('admin.index') }}" class="text-link">Data Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Data Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow px-3">
            <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data"
                class="mt-2">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukan Nama" id="nama" value="{{ old('name') ?? $admin->name }}">
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
                            placeholder="Masukan No Telepon" id="notlp"
                            value="{{ old('phone_number') ?? $admin->phone_number }}">
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
                            placeholder="Masukan Email" id="email" value="{{ old('email') ?? $admin->email }}">
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
                            placeholder="Masukan Alamat">{!! old('address') ?? $admin->address !!}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-6 mb-1">
                            <div class="form-group">
                                <label for="password">Password Baru <span class="text-danger">*</span></label>
                                <div class="input-group border-password">
                                    <input class="form-control border-0 @error('password') is-invalid @enderror"
                                        name="password" id="password" type="password"
                                        placeholder="Masukan Password Baru (Minimal 8 Karakter)"
                                        autocomplete="current-password" id="password"><span role="button" class="d-flex"
                                        style="cursor: pointer;"><i class="fas fa-eye-slash fa-xs mr-2 my-auto"
                                            id="togglePassword"></i></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="passwordConfirm">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="input-group border-password">
                                    <input
                                        class="form-control border-0 @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" id="passwordConfirm" type="password"
                                        placeholder="Masukan Konfirmasi Password" autocomplete="current-password"><span
                                        role="button" class="d-flex" style="cursor: pointer;"><i
                                            class="fas fa-eye-slash fa-xs mr-2 my-auto"
                                            id="togglePasswordConfirm"></i></span>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                <div class="form-group mb-3">
                    <label for="status">Roles <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="status" id="status"
                            class="form-control  @error('status') is-invalid @enderror">
                            <option value="">Select Status</option>
                            <option value="1" {{ $admin->status == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $admin->status == 0 ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                        @error('status')
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
