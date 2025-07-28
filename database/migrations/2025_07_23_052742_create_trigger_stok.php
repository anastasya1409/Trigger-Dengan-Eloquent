<?php

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::unprepared('
            CREATE TRIGGER after_stok_in_insert
            AFTER INSERT ON stokins
            FOR EACH ROW
            BEGIN
                UPDATE produks
                SET stok = stok + NEW.jumlah
                WHERE id = NEW.produk_id;
            END
        ');
        DB::unprepared('
            CREATE TRIGGER after_stok_out_insert
            AFTER INSERT ON stokouts
            FOR EACH ROW
            BEGIN
                UPDATE produks
                SET stok = stok - NEW.jumlah
                WHERE id = NEW.produk_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_stok_in_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS after_stok_out_insert');
    }
};