@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Satuan</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('satuan.create') }}" class="btn btn-primary me-md-2">Add Satuan</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($satuans as $satuan)
                        <tr>
                            <td>{{ $satuan->id }}</td>
                            <td>{{ $satuan->nama_satuan }}</td>
                            <td>
                                <a href="{{ route('satuan.edit', ['satuan' => $satuan->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('satuan.destroy', ['satuan' => $satuan->id]) }}" method="post" style="display: inline;">
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
