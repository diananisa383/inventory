@extends("blank")

@section("content")

<div class="container">
    <h1 class="page-title">Dashboard</h1>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <h5 class="card-title text-white">Jenis</h5>
                    <p class="card-text text-white">{{ $totalJenis }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <h5 class="card-title text-white">Satuan</h5>
                    <p class="card-text text-white">{{ $totalSatuan }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title text-white">Barang</h5>
                    <p class="card-text text-white">{{ $totalBarang }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <h5 class="card-title text-white">Pengirim</h5>
                    <p class="card-text text-white">{{ $totalPengirim }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h5 class="card-title text-white">Penerima</h5>
                    <p class="card-text text-white">{{ $totalPenerima }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-secondary">
                <div class="card-body">
                    <h5 class="card-title text-white">Barang Masuk</h5>
                    <p class="card-text text-white">{{ $totalBarangMasuk }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-dark">
                <div class="card-body">
                    <h5 class="card-title text-white">Barang Keluar</h5>
                    <p class="card-text text-white">{{ $totalBarangKeluar }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <p class="card-text">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
