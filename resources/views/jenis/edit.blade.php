@extends("blank") <!-- Ganti dengan nama layout yang Anda gunakan -->

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Edit Jenis Barang</h1>
            <form action="{{ route('jenis.update', ['jenis' => $jenis->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Nama Jenis</label>
                    <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ $jenis->nama_jenis }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
