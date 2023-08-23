@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Barang</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('barang.create') }}" class="btn btn-primary me-md-2">Add Barang</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Stock</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $barang)
                        <tr>
                            <td>{{ $barang->id }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->jenises->nama_jenis }}</td>
                            <td>{{ $barang->satuans->nama_satuan }}</td>
                            <td>{{ $barang->stock_barang }}</td>
                            <td>
                                <a href="{{ route('barang.edit', ['barang' => $barang->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('barang.destroy', ['barang' => $barang->id]) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
