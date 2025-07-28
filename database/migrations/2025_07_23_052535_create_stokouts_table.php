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
        Schema::create('stokouts', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->integer('jumlah')-> defauld(0);
            $table->string('keterangan')->nullable();
            $table->date('tgl_keluar')->defauld(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokouts');
    }
};
