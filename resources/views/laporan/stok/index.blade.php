@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Laporan Stok</h1>
            <div class="table-responsive">
                @if(empty($laporanstoks))
                    <p>No data available.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Jumlah Masuk</th>
                                <th>Jumlah Keluar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporanstoks as $laporanstok)
                                <tr>
                                    <td>{{ $laporanstok['tanggal'] }}</td>
                                    <td>{{ $laporanstok['nama_barang'] }}</td>
                                    <td>{{ $laporanstok['pengirim'] }}</td>
                                    <td>{{ $laporanstok['penerima'] }}</td>
                                    <td>{{ $laporanstok['jumlah_masuk'] }}</td>
                                    <td>{{ $laporanstok['jumlah_keluar'] }}</td>
                                    <td>{{ $laporanstok['keterangan'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
