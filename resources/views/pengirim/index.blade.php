@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Pengirim</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('pengirim.create') }}" class="btn btn-primary me-md-2">Add Pengirim</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pengirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengirims as $pengirim)
                        <tr>
                            <td>{{ $pengirim->id }}</td>
                            <td>{{ $pengirim->nama_pengirim }}</td>
                            <td>
                                <a href="{{ route('pengirim.edit', ['pengirim' => $pengirim->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('pengirim.destroy', ['pengirim' => $pengirim->id]) }}" method="post" style="display: inline;">
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
