@extends("blank")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Hapus Jenis Barang</h1>
            <p>Anda yakin ingin menghapus jenis barang ini?</p>
            <form action="{{ route('jenis.destroy', ['jenis' => $jenis->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

@endsection
