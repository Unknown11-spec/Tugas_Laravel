@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('home')}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fa fa-shopping-cart"></i>Check Out</h3>
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
                                <th>Hapus</th>
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
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('Delete') }}
                                        <button onclick="return confirm('Yakin ingin menghapus barang ?');" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr align="center">
                                <td colspan="5"> <strong>Total Harga : </strong> </td>
                                <td> <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong> </td>
                                <td>
                                    <a onclick="return confirm('Yakin ingin Check Out ?');" href="{{ url('konfirmasi-check-out') }}" class="btn btn-success"> <i class="fa fa-shopping-cart"></i>Check out</a>
                                </td>
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