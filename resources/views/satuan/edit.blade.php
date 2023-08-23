@extends("blank") <!-- Ganti dengan nama layout yang Anda gunakan -->

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Edit Satuan Barang</h1>
            <form action="{{ route('satuan.update', ['satuan' => $satuan->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_satuan" class="form-label">Nama Satuan</label>
                    <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" value="{{ $satuan->nama_satuan }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
