<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\TransaksiTransfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function createTransfer(Request $request)
{
    $validated = $request->validate([
        'nilai_transfer' => 'required|numeric',
        'bank_tujuan' => 'required',
        'rekening_tujuan' => 'required',
        'atasnama_tujuan' => 'required',
        'bank_pengirim' => 'required',
    ]);

    $kodeUnik = rand(100, 999);
    $totalTransfer = $request->nilai_transfer + $kodeUnik;
    $transactionId = 'TF' . now()->format('Ymd') . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

    $rekeningPerantara = 12700283733;

    $transfer = TransaksiTransfer::create([
        'id_transaksi' => $transactionId,
        'nilai_transfer' => $request->nilai_transfer,
        'kode_unik' => $kodeUnik,
        'total_transfer' => $totalTransfer,
        'bank_pengirim_id' => $request->bank_pengirim,
        'bank_tujuan_id' => $request->bank_tujuan,
        'rekening_perantara' => $rekeningPerantara,
        'rekening_tujuan' => $request->rekening_tujuan,
        'atasnama_tujuan' => $request->atasnama_tujuan,
        'user_id' => auth()->id(),
        'biaya_admin' => 0,
    ]);

    return response()->json([
        'id_transaksi' => $transactionId,
        'nilai_transfer' => $request->nilai_transfer,
        'kode_unik' => $kodeUnik,
        'biaya_admin' => 0,
        'total_transfer' => $totalTransfer,
        'bank_perantara' => $transfer->bankPengirim->nama_bank,
        'rekening_perantara' => $transfer->rekening_perantara,
        'berlaku_hingga' => now()->addDays(1)->toDateTimeString(),
    ]);
}
}
