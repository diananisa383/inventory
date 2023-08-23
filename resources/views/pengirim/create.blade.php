@extends("blank") <!-- Ganti dengan nama layout yang Anda gunakan -->

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Tambah Pengirim Barang Baru</h1>
            <form action="{{ route('pengirim.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
