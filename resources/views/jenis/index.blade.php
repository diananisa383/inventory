@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Semua Data Jenis</h1>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('jenis.create') }}" class="btn btn-primary me-md-2">Add Jenis</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Jenis</th>
                        <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenises as $jenis)
                        <tr>
                            <td>{{ $jenis->id }}</td>
                            <td>{{ $jenis->nama_jenis }}</td>
                            <td>
                                <a href="{{ route('jenis.edit', ['jenis' => $jenis->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('jenis.destroy', ['jenis' => $jenis->id]) }}" method="post" style="display: inline;">
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
