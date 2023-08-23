@extends("blank") <!-- Ganti dengan nama layout yang Anda gunakan -->

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Edit Barang</h1>
            <form action="{{ route('barang.update', ['barang' => $barang->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_id" class="form-label">Jenis Barang</label>
                    <select class="form-control" id="jenis_id" name="jenis_id">
                        @foreach($jenises as $id => $nama_jenis)
                        <option value="{{ $id }}" {{ $barang->jenis_id == $id ? 'selected' : '' }}>{{ $nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="satuan_id" class="form-label">Satuan Barang</label>
                    <select class="form-control" id="satuan_id" name="satuan_id">
                        @foreach($satuans as $id => $nama_satuan)
                        <option value="{{ $id }}" {{ $barang->satuan_id == $id ? 'selected' : '' }}>{{ $nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stock_barang" class="form-label">Stok Barang</label>
                    <input type="number" class="form-control" id="stock_barang" name="stock_barang" value="{{ $barang->stock_barang }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
