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
        Schema::table('transaksi_transfers', function (Blueprint $table) {
            $table->string('rekening_perantara')->nullable()->after('bank_tujuan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_transfers', function (Blueprint $table) {
            $table->dropColumn('rekening_perantara');
        });
    }
};
