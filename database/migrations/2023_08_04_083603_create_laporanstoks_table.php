
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
        Schema::create('laporanstoks', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->unsignedBigInteger('barang_id');
        $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        $table->unsignedBigInteger('pengirim_id');
        $table->foreign('pengirim_id')->references('id')->on('pengirims')->onDelete('cascade');
        $table->unsignedBigInteger('penerima_id');
        $table->foreign('penerima_id')->references('id')->on('penerimas')->onDelete('cascade');
        $table->integer('jumlah_masuk');
        $table->integer('jumlah_keluar');
        $table->integer('total_stock');
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporanstoks');
    }
};
