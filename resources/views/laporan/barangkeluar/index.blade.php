@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Laporan Barang Keluar</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Jumlah Keluar</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangkeluars as $barangkeluar)
                        <tr>
                            <td>{{ $barangkeluar->id }}</td>
                            <td>{{ $barangkeluar->tanggal}}</td>
                            <td>{{ $barangkeluar->barangs->nama_barang }}</td>
                            <td>{{ $barangkeluar->pengirims->nama_pengirim }}</td>
                            <td>{{ $barangkeluar->penerimas->nama_penerima }}</td>
                            <td>{{ $barangkeluar->jumlah_keluar }}</td>
                            <td>{{ $barangkeluar->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
