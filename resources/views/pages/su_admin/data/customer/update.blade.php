@extends('layouts.su-admin')

@section('title')
    Metashare Super Admin - Update Data Customer
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Update Customer</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('customer.index') }}" class="text-link">Data Kustomer</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Customer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow px-3">
            <form class="mt-4" action="{{ route('customer.update', $customer->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <p class="text-primary">Data Kustomer</p>
                <div class="form-group mb-3">
                    <label for="customerName">Nama Kustomer <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukan Nama Kustomer" id="customerName"
                            value="{{ old('name') ?? $customer->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="phoneNumber">No Telepon <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="Masukan No Telepon" id="phoneNumber"
                            value="{{ old('phone_number') ?? $customer->phone_number }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="customerEmail">Email <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email" id="customerEmail" value="{{ old('email') ?? $customer->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="customerAddress">Alamat <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="customerAddress"
                            placeholder="Masukan Alamat">{!! old('address') ?? $customer->address !!}</textarea>
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
                    <label for="customerPhotos">Upload Foto Profile<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend h-75">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="photos"
                                class="custom-file-input @error('photos') is-invalid @enderror"
                                accept="image/jpeg, image/png, image/jpg" id="customerPhotos">
                            <label class="custom-file-label" for="customerPhotos">Choose file</label>
                        </div>
                    </div>
                    <p>Catatan: File max 2mb format (PNG,JPG,JPEG) </p>
                </div>
                <div class="row">
                    <div class="text-center">
                        <img id="customerPhotosPreview" src="{{ Storage::url($customer->photos) }}"
                            class="rounded w-25 mx-auto d-block" alt="prview-image">
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

@push('addon-script')
    <script>
        $("#customerPhotos").change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#customerPhotosPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
