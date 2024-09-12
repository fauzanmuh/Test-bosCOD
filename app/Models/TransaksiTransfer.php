<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi', 'nilai_transfer', 'kode_unik', 'total_transfer',
        'biaya_admin', 'rekening_tujuan', 'atasnama_tujuan',
        'bank_pengirim_id', 'bank_tujuan_id', 'rekening_perantara', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bankPengirim() {
        return $this->belongsTo(Bank::class, 'bank_pengirim_id');
    }
    
    public function bankTujuan() {
        return $this->belongsTo(Bank::class, 'bank_tujuan_id');
    }
}
