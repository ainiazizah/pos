@extends('layout.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/category') }}">Category</a></li>
                    <li class="breadcrumb-item active">Edit Data Category</li>
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
                            <form method="POST" action="/category/{{ $category->id }}">
                                @method('put')
                                @csrf
                                <div class="row mb-3">
                                    <label for="name_category" class="col-sm-2 col-form-label">NAMA CATEGORY</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('name_category') is-invalid @enderror"
                                            id="name_category" name="name_category" value="{{ $category->name_category }}">
                                        @error('name_category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
