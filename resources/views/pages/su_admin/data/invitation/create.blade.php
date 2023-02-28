@extends('layouts.su-admin')

@section('title')
    Dashboard Super Admin - Create Model Undangan
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Model Undangan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('invitation.index') }}" class="text-link">Data Model Undangan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Model Undangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow px-3">
            <form action="{{ route('invitation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="jenisUndangan">Jenis Undangan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="type" class="form-control" readonly
                            value="Undangan Pernikahan Digital" id="jenisUndangan">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="kategoriUndangan">Kategori Undangan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select class="form-control @error('categories_id') is-invalid @enderror" id="change-category"
                            name="categories_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categories_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="modelName">Nama Model <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="name" id="modelName"
                            class="form-control @error('name')
                            is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="modelPrice">Harga <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" name="price" id="modelPrice"
                            class="form-control @error('price')
                            is-invalid @enderror"
                            value="{{ old('price') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="imageCoverOne">Upload Sampul Undangan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend h-75">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="cover_one"
                                class="custom-file-input @error('cover_one') is-invalid @enderror"
                                accept="image/jpeg, image/png, image/jpg" id="imageCoverOne">
                            <label class="custom-file-label" for="imageCoverOne">Choose file</label>
                        </div>
                        @error('cover_one')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <p>Catatan: File max 2mb format (SVG,PNG,JPG,JPEG), rekomendasi format SVG (270 x 378 pixels) </p>
                </div>
                <div class="row" id="preview-image-one" style="display:none">
                    <div class="text-center">
                        <img id="coverOne" src="..." class="rounded w-25 mx-auto d-block" alt="prview-image">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="imageCoverTwo">Upload Cover Undangan <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend h-75">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="cover_two"
                                class="custom-file-input  @error('cover_two') is-invalid @enderror"
                                accept="image/jpeg, image/png, image/jpg" id="imageCoverTwo">
                            <label class="custom-file-label" for="imageCoverTwo">Choose file</label>
                        </div>
                        @error('cover_two')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <p>Catatan: File max 2mb format (SVG,PNG,JPG,JPEG), rekomendasi format SVG (270 x 378 pixels) </p>
                </div>
                <div class="row" id="preview-image-two" style="display:none">
                    <div class="text-center">
                        <img id="coverTwo" src="..." class="rounded w-25 mx-auto d-block" alt="prview-image">
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
        $("#imageCoverOne").change(function() {
            let reader = new FileReader();
            $("#preview-image-one").removeAttr('style');
            reader.onload = (e) => {
                $('#coverOne').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $("#imageCoverTwo").change(function() {
            let reader = new FileReader();
            $("#preview-image-two").removeAttr('style');
            reader.onload = (e) => {
                $('#coverTwo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
