<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi')->unique();
            $table->decimal('nilai_transfer', 15, 2);
            $table->integer('kode_unik');
            $table->decimal('total_transfer', 15, 2);
            $table->decimal('biaya_admin', 15, 2)->default(0);
            $table->string('rekening_tujuan');
            $table->string('atasnama_tujuan');
            $table->foreignId('bank_pengirim_id')->constrained('banks')->onDelete('cascade');
            $table->foreignId('bank_tujuan_id')->constrained('banks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_transfers');
    }
};
