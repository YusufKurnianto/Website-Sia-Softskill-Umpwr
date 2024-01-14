<?php

namespace App\Http\Controllers;

use App\Models\peserta;
use Illuminate\Http\Request;

class IntegrasiDataController extends Controller
{
    public function getDataIntegrasi()
    {
        $dataIntegrasi = peserta::join('fasilitators', 'peserta.id', '=', 'fasilitators.id')
            ->join('nilai_peserta', 'peserta.nim', '=', 'nilai_peserta.nim')
            ->select('peserta.*', 'fasilitators.nama as nama_fasilitators', 'nilai_peserta.*')
            ->get();

        return response()->json($dataIntegrasi);
    }
}
