@extends('layout.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/category') }}">Product</a></li>
                    <li class="breadcrumb-item active">Edit Data Product</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">EDIT DATA CATEGORY</h5>

                            <!-- General Form Elements -->
                            <form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mb-3">
                                    <label for="name_product" class="col-sm-2 col-form-label">NAMA PRODUCT</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('name_product') is-invalid @enderror"
                                            id="name_product" name="name_product" value="{{ $product->name_product }}">
                                        @error('name_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="id_category" class="col-sm-2 col-form-label">DESKRIPSI</label>
                                    <div class="col-sm-10">
                                        <select for="id_category"
                                            class="form-select @error('id_category') is-invalid @enderror" id="id_category"
                                            name="id_category">
                                            <option selected>=== PILIH KATEGORI ===</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->id_category == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name_category }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description_product" class="col-sm-2 col-form-label">KATEGORI</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('description_product') is-invalid @enderror"
                                            id="description_product" name="description_product"
                                            value="{{ $product->description_product }}">
                                        @error('description_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="price_product" class="col-sm-2 col-form-label">HARGA</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('price_product') is-invalid @enderror"
                                            id="price_product" name="price_product" value="{{ $product->price_product }}">
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
                                        <input class="form-control @error('image_product') is-invalid @enderror"
                                            type="file" id="image-product" name="image_product"
                                            value="{{ $product->image_product }}">
                                        @error('image_product')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                            </form>
                        @endsection
