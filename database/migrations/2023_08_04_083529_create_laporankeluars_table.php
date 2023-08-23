
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporankeluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->unsignedBigInteger('pengirim_id');
            $table->foreign('pengirim_id')->references('id')->on('pengirims');
            $table->unsignedBigInteger('penerima_id');
            $table->foreign('penerima_id')->references('id')->on('penerimas');
            $table->integer('jumlah_keluar');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporankeluars');
    }
};
