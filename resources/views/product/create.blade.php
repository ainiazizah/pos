@extends('layout.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product Table</h5>
                            <a href="{{ url('/product/add') }}">
                                <button type="button" class="btn btn-primary">+ TAMBAH DATA</button>
                            </a>
                            <br>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NAMA PRODUK</th>
                                        <th scope="col">KATEGORI</th>
                                        <th scope="col">DESKRIPSI</th>
                                        <th scope="col">HARGA</th>
                                        <th scope="col">FOTO</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th>{{ $no++ }}.</th>
                                            <td>{{ $product->name_product }}</td>
                                            <td>{{ $product->name_category }}</td>
                                            <td>{{ $product->description_product }}</td>
                                            <td>Rp{{ $product->price_product }},00</td>
                                            <td><img class="rounded" src="{{ asset('storage/' . $product->image_product) }}"
                                                    width="130" height="135"></td>
                                            <td>
                                                <a href="/product/{{ $product->id }}/edit"
                                                    class="btn btn-xs btn-warning mb-2">Edit</a>
                                                <a href="/product/{{ $product->id }}/delete"
                                                    class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Are u Sure?');">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
