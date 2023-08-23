@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Laporan Barang Masuk</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Jumlah Masuk</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangmasuks as $barangmasuk)
                        <tr>
                            <td>{{ $barangmasuk->id }}</td>
                            <td>{{ $barangmasuk->tanggal }}</td>
                            <td>{{ $barangmasuk->barangs->nama_barang }}</td>
                            <td>{{ $barangmasuk->pengirims->nama_pengirim }}</td>
                            <td>{{ $barangmasuk->penerimas->nama_penerima }}</td>
                            <td>{{ $barangmasuk->jumlah_masuk }}</td>
                            <td>{{ $barangmasuk->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
