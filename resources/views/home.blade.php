@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <br>
            </div>
        </div> -->
        @foreach ($barangs as $barang)
        <div class="col-md-4">
            <div class="card" style="width: 22rem;">
                <img src="{{ url('uploads') }}/{{ $barang -> gambar }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang -> nama_barang }}</h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <strong> Harga : </strong> Rp. {{ number_format( $barang -> harga )}} <br>
                    <strong> Stok : </strong> {{ $barang -> stok }} <br> 
                    <hr>
                    <strong> Keterangan : </strong> <br>
                    {{ $barang -> keterangan }} <br> <br>
                    <a href=" {{url('pesan')}}/{{$barang->id}} " class="btn btn-primary "><i class="fa fa-shopping-cart"></i>Pesan</a>
                </div>
            </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection
