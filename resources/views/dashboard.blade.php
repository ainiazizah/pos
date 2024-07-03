@extends('layout.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    {{-- <h2>TOKO WAHYU ILLAHI</h2> --}}
    <div class="row row-cols-3">
        <div style="width: 35rem; margin-left: auto;
        margin-right: auto; margin-top: 20px">
            <img src="{{ asset('template/assets/img/Toko.jpg') }}" class="card-img-top" alt="...">
           
    </div>
</main>
@endsection
