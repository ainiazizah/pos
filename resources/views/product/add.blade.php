@extends('layout.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/product') }}">Product</a></li>
                    <li class="breadcrumb-item active">Tambah Data Product</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TAMBAH DATA PRODUCT</h5>

                            <!-- General Form Elements -->
                            <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name_category" class="col-sm-2 col-form-label">NAMA PRODUK</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('name_product') is-invalid @enderror"
                                            name="name_product">
                                        @error('name_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">KATEGORI</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="id_category">
                                            <option selected>== PILIH KATEGORI ==</option>
                                            @foreach ($categories as $kt)
                                                <option value="{{ $kt->id }}">{{ $kt->name_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">DESKRIPSI</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('description_product') is-invalid @enderror" style="height: 100px"
                                            name="description_product"></textarea>
                                        @error('description_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">HARGA</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('price_product') is-invalid @enderror"
                                            name="price_product">
                                        @error('price_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">UPLOAD FOTO</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="image_product">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">TAMBAH</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
