@extends("blank")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Tambah Barang Keluar</h1>
            <form action="{{ route('barangkeluar.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="mb-3">
                    <label for="barang_id" class="form-label">Barang</label>
                    <select class="form-control" id="barang_id" name="barang_id">
                        @foreach($barangs as $id => $nama_barang)
                        <option value="{{ $id }}">{{ $nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pengirim_id" class="form-label">Pengirim</label>
                    <select class="form-control" id="pengirim_id" name="pengirim_id">
                        @foreach($pengirims as $id => $nama_pengirim)
                        <option value="{{ $id }}">{{ $nama_pengirim }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penerima_id" class="form-label">Penerima</label>
                    <select class="form-control" id="penerima_id" name="penerima_id">
                        @foreach($penerimas as $id => $nama_penerima)
                        <option value="{{ $id }}">{{ $nama_penerima }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_keluar" class="form-label">Jumlah Keluar</label>
                    <input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
