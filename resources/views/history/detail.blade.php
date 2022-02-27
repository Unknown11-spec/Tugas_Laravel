@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('history')}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <!-- <h5>Pesanan sukses di Check Out, <br> untuk pembayaran silahkan transfer ke rekening <strong>: 123</strong> <br> dengan nominal <strong>: Rp.{{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5> -->
                    <h5>Pesanan sukses di Check Out, <br> untuk pembayaran silahkan transfer ke rekening <strong>: 123</strong> <br> dengan nominal <strong>: Rp.{{ number_format($pesanan->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    <h3> <i class="fa fa-shopping-cart"></i>Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" alt="" width="100">
                                </td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }} Kain</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                
                            </tr>
                            @endforeach
                            <tr align="center">
                                <td colspan="5"> <strong>Total Harga : </strong> </td>
                                <td> <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong> </td>
                            </tr>

                            <tr align="center">
                                <td colspan="5"> <strong>Kode : </strong> </td>
                                <td> <strong>{{ number_format($pesanan->kode) }}</strong> </td>
                            </tr>

                            <tr align="center">
                                <td colspan="5"> <strong>Total yang harus ditransfer : </strong> </td>
                                <!-- <td> <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong> </td> -->
                                <td> <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong> </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection