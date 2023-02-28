@extends('layouts.admin')

@section('name')
    Dashboard Admin - Data Model Undangan
@endsection

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Model Undangan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item disabled" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Model Undangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow px-5 py-3">
            <div class="form-group col-4 mt-4">
                <div class="input-group mb-2 ml-n3">
                    <select class="form-control" id="categories" name="category">
                        @foreach ($categories as $category)
                            <option value="{!! $category->slug !!}"
                                {{ Request::segment(4) == $category->slug ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-filter"></i></div>
                    </div>
                </div>
            </div>


            <div class="tab-content mb-3">
                <div class="tab-pane show active" id="pernikahanIslami">
                    <div class="row ml-0">
                        @forelse ($invitations as $item)
                            <!-- Item Model -->
                            <div class="card shadow-sm card-sampul-cover p-2 mx-2 mb-3">
                                <div id="carousel-sampul-cover" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="img-sampul-cover mx-auto"
                                                src="{{ Storage::url($item->cover_one) ?? '' }}" alt="Cover">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="img-sampul-cover mx-auto"
                                                src="{{ Storage::url($item->cover_two) ?? '' }}" alt="Cover">
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-sampul-cover" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-sampul-cover" data-slide-to="1"></li>
                                    </ol>
                                </div>
                                <h5 class="text-black mt-4">{{ $item->name }}</h5>
                                <p>{{ $item->type . ' / ' . $item->category->name }}</p>
                                <h4 class="text-danger mt-n2">Rp. {{ number_format($item->price) }}</h4>
                                <div class="mt-2">
                                    <a target="_blank" href="demo.php"
                                        class="btn btn-sm btn-outline-info text-sm  px-2 mr-3">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span class="mb-1">Demo</span>
                                    </a>
                                </div>
                                <div class="text-xs mt-3 mb-n2">
                                    <span>
                                        <i data-feather="plus" class="feather-icon feather-10"></i>
                                        {{ $item->created_at }} WIB
                                    </span>
                                    <span>
                                        <i data-feather="edit" class="feather-icon feather-10 ml-2"></i>
                                        {{ $item->updated_at }} WIB
                                    </span>
                                </div>
                                <hr class="mx-n2">
                                <p class="mx-2">
                                    Total Order : {{ App\Models\TransactionDetail::where('models_id', $item->id)->count() }}
                                </p>
                                <span class="border-left mt-n3 mb-n2 mx-2"></span>
                            </div>
                            <!-- Item Model End -->
                        @empty
                            empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        var categories = document.querySelector('#categories');
        categories.addEventListener('change', function(event) {
            var category = event.target.value;
            var url = '{!! route('data-category-invitation', ':category') !!}';
            url = url.replace(':category', category);
            window.location.href = url;
        })
    </script>
@endpush
