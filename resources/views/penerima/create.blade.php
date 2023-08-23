@extends("blank") <!-- Ganti dengan nama layout yang Anda gunakan -->

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Tambah Penerima Barang Baru</h1>
            <form action="{{ route('penerima.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_penerima" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
