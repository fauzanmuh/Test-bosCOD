<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
    ];

    public function rekeningAdmin() {
        return $this->hasMany(RekeningAdmin::class);
    }

    public function transaksiTransferPengirim() {
        return $this->hasMany(TransaksiTransfer::class, 'bank_pengirim_id');
    }

    public function transaksiTransferPenerima() {
        return $this->hasMany(TransaksiTransfer::class, 'bank_tujuan_id');
    }
}
