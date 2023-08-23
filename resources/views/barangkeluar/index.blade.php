@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Barang Keluar</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('barangkeluar.create') }}" class="btn btn-primary me-md-2">Add Barang Keluar</a>
            </div>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangkeluars as $barangkeluar)
                        <tr>
                            <td>{{ $barangkeluar->id }}</td>
                            <td>{{ $barangkeluar->tanggal }}</td>
                            <td>{{ $barangkeluar->barangs->nama_barang }}</td>
                            <td>{{ $barangkeluar->pengirims->nama_pengirim }}</td>
                            <td>{{ $barangkeluar->penerimas->nama_penerima }}</td>
                            <td>{{ $barangkeluar->jumlah_keluar }}</td>
                            <td>{{ $barangkeluar->keterangan }}</td>
                            <td>
                                <a href="{{ route('barangkeluar.edit', ['barangkeluar' => $barangkeluar->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('barangkeluar.destroy', ['barangkeluar' => $barangkeluar->id]) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
