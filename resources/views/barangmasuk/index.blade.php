@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Barang Masuk</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary me-md-2">Add Barang Masuk</a>
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
                            <th>Jumlah Masuk</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
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
                            <td>
                                <a href="{{ route('barangmasuk.edit', ['barangmasuk' => $barangmasuk->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('barangmasuk.destroy', ['barangmasuk' => $barangmasuk->id]) }}" method="post" style="display: inline;">
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
