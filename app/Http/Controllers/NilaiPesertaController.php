<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiPeserta;

class NilaiPesertaController extends Controller
{
    public function index(Request $request)
    {
        $years = [2022, 2023, 2024];
        $levels = ['A', 'B', 'C'];

        $selectedYear = $request->input('tahun', null);
        $selectedLevel = $request->input('level', null);

        $nilaiPesertas = NilaiPeserta::where(function ($query) use ($selectedYear, $selectedLevel) {
            if (!is_null($selectedYear)) {
                $query->where('tahun', $selectedYear);
            }
            if (!is_null($selectedLevel)) {
                $query->where('level', $selectedLevel);
            }
        })->get();

        return view('nilai_peserta.index', compact('years', 'levels', 'selectedYear', 'selectedLevel', 'nilaiPesertas'));
    }

    public function create()
    {
        $years = [2022, 2023, 2024];
        $levels = ['A', 'B', 'C'];

        return view('nilai_peserta.create', compact('years', 'levels'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required',
        'nama_peserta' => 'required',
        'nama_fasilitator' => 'required',
        'nilai_akhir' => 'required|numeric',
        'presensi' => 'required|integer',
        'total_nilai' => 'required|numeric',
        'tahun' => 'required|numeric',
        'level' => 'required',
    ]);

    $inputData = $request->all();

    // Tambahkan inisialisasi nilai 'tahun' jika tidak tersedia dalam request
    $inputData['tahun'] = $request->input('tahun', date('Y'));

    $nilaiPeserta = NilaiPeserta::create($inputData);

    // Hitung dan set konversi nilai berdasarkan kriteria
    $konversi_nilai = $this->hitungKonversiNilai($nilaiPeserta->total_nilai);
    $nilaiPeserta->update(['konversi_nilai' => $konversi_nilai]);

    return redirect()->route('nilai_peserta.index')
        ->with('success', 'Nilai peserta berhasil disimpan.');
}

public function edit($id)
{
    $nilaiPeserta = NilaiPeserta::find($id);

    // Mendapatkan nilai unik untuk tahun dan level dari model jika diperlukan
    $years = NilaiPeserta::distinct('tahun')->pluck('tahun');
    $levels = NilaiPeserta::distinct('level')->pluck('level');

    return view('nilai_peserta.edit', compact('nilaiPeserta', 'years', 'levels'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama_peserta' => 'required',
            'nama_fasilitator' => 'required',
            'nilai_akhir' => 'required|numeric',
            'presensi' => 'required|integer',
            'total_nilai' => 'required|numeric',
            'tahun' => 'required|numeric',
            'level' => 'required',
        ]);

        $nilaiPeserta = NilaiPeserta::find($id);
        $nilaiPeserta->tahun = $request->input('tahun', $nilaiPeserta->tahun); // Set nilai 'tahun'
        $nilaiPeserta->update($request->all());


        // Hitung dan set konversi nilai berdasarkan kriteria
        $konversi_nilai = $this->hitungKonversiNilai($nilaiPeserta->total_nilai);
        $nilaiPeserta->update(['konversi_nilai' => $konversi_nilai]);

        return redirect()->route('nilai_peserta.index')
            ->with('success', 'Nilai peserta berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nilaiPeserta = NilaiPeserta::findOrFail($id);
        $nilaiPeserta->delete();

        return redirect()->route('nilai_peserta.index')->with('success', 'Data berhasil dihapus.');
    }

    // Metode lainnya tetap sama...

    private function hitungKonversiNilai($totalNilai)
    {
        // Sesuaikan kriteria konversi nilai sesuai kebutuhan
        if ($totalNilai >= 85 && $totalNilai <= 100) {
            return 'A';
        } elseif ($totalNilai >= 70 && $totalNilai < 85) {
            return 'B';
        } elseif ($totalNilai >= 60 && $totalNilai < 70) {
            return 'C';
        } elseif ($totalNilai < 60) {
            return 'D';
        } else {
            return 'Tidak Valid';
        }
    }
}