@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Penerima</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('penerima.create') }}" class="btn btn-primary me-md-2">Add Penerima</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Penerima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penerimas as $penerima)
                        <tr>
                            <td>{{ $penerima->id }}</td>
                            <td>{{ $penerima->nama_penerima }}</td>
                            <td>
                                <a href="{{ route('penerima.edit', ['penerima' => $penerima->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('penerima.destroy', ['penerima' => $penerima->id]) }}" method="post" style="display: inline;">
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
