@extends('layout.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Transaction</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Transaction Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <!-- <th scope="col">NAMA PRODUK</th> -->
                                        <!-- <th scope="col">KUANTITAS</th> -->
                                        <!-- <th scope="col">TOTAL</th> -->
                                        <th scope="col">ANTRIAN</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">TANGGAL</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th>{{ $no++ }}.</th>
                                            <!-- <td>{{ $transaction->name_product }}</td> -->
                                            <!-- <td>{{ $transaction->qty }}</td> -->
                                            <!-- <td>Rp{{ $transaction->total_price }},00</td> -->
                                            <td>{{ $transaction->customer_idx }}</td>
                                            <td>{{ $transaction->total_price }}</td>
                                            <td>{{ $transaction->created_at->format('d F Y') }} ,
                                                {{ $transaction->created_at->addHours(7)->format('H:i:s') }}</td>
                                            <td><a href="{{ route('transaction.receipt', $transaction->customer_idx) }}"
                                                class="btn btn-primary">View</a></td>
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
