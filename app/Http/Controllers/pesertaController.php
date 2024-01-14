<?php

namespace App\Http\Controllers;

use App\Models\peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class PesertaController extends Controller
{
    /**
     * Menampilkan daftar peserta.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $level = $request->level;
        $tahun = $request->tahun;
        $jumlahbaris = 5;

        // Menggunakan metode when untuk membuat query pencarian yang lebih dinamis
        $data = peserta::when($katakunci, function ($query) use ($katakunci) {
            // Pencarian berdasarkan NIM atau Nama Lengkap
            $query->where(function ($query) use ($katakunci) {
                $query->where('nim', 'like', "%$katakunci%")
                    ->orWhere('nama_lengkap', 'like', "%$katakunci%");
            });
        })
            ->when($level, function ($query) use ($level) {
                // Pencarian berdasarkan Level
                $query->where('level', 'like', "%$level%");
            })
            ->when($tahun, function ($query) use ($tahun) {
                // pencarian berdasarkan Tahun
                $query->where('tahun', 'like', "%$tahun%");
            })
            ->orderBy('nim', 'asc') // Mengurutkan berdasarkan NIM dari terkecil ke terbesar
            ->paginate($jumlahbaris);

        // Menghitung nomor item berdasarkan nomor halaman dan jumlah item per halaman
        $startNumber = ($data->currentPage() - 1) * $data->perPage() + 1;

        // Kirim data ke tampilan peserta.index
        return view('peserta.index')->with([
            'data' => $data,
            'startNumber' => $startNumber,
            'notFoundMessage' => ($data->isEmpty() && ($katakunci || $level || $tahun)) ? 'Data tidak ditemukan. Mohon periksa lagi!' : null,
        ]);
    }

    //Menampilkan halaman formulir untuk menambahkan peserta baru.
    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Menyimpan data peserta baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Menyimpan inputan dari formulir ke dalam session untuk ditampilkan kembali jika terjadi validasi error
        Session::flash('nim', $request->nim);
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('prodi', $request->prodi);
        Session::flash('level', $request->level);
        Session::flash('tahun', $request->tahun);

        // Melakukan validasi input dari formulir
        $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
            'prodi' => 'required',
            'level' => 'required',
            'tahun' => 'required|in:2021,2022,2023',
        ], [
            // Pesan-pesan error untuk setiap aturan validasi
            'nim.required' => 'NIM wajib diisi',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'prodi.required' => 'Prodi wajib diisi',
            'level.required' => 'Level wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
        ]);

        // Menyusun data peserta yang akan disimpan ke dalam database
        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'prodi' => $request->prodi,
            'level' => $request->level,
            'tahun' => $request->tahun,
        ];

        // Menyimpan data peserta ke dalam database
        peserta::create($data);

        // Mengalihkan pengguna ke halaman peserta dengan pesan sukses
        return redirect()->to('peserta')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Menampilkan halaman formulir untuk mengedit peserta.
     */
    public function edit($id)
    {
        // Mengambil data peserta berdasarkan ID
        try {
            $decryptID = Crypt::decryptString($id);
            $data = peserta::find($decryptID);

            // Menampilkan halaman edit dengan data peserta
            return view('peserta.edit')->with('data', $data);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle jika terjadi kesalahan saat mendekripsi ID
            \Log::error("Error decrypting ID: " . $e->getMessage());
            return redirect()->to('peserta')->with('error', 'Error decrypting ID');
        }
    }

    /**
     * Menyimpan perubahan data peserta ke dalam database.
     */
    public function update(Request $request, string $id)
    {
        // Melakukan validasi input dari formulir
        $request->validate([
            'nim' => 'required',
            'nama_lengkap' => 'required',
            'prodi' => 'required',
            'level' => 'required',
            'tahun' => 'required|in:2021,2022,2023',
        ], [
            // Pesan-pesan error untuk setiap aturan validasi
            'nim.required' => 'NIM wajib diisi',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'prodi.required' => 'Prodi wajib diisi',
            'level.required' => 'Level wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
        ]);

        // Menyusun data peserta yang akan diupdate ke dalam database
        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'prodi' => $request->prodi,
            'level' => $request->level,
            'tahun' => $request->tahun,
        ];

        // Mengupdate data peserta berdasarkan ID
        peserta::where('id', $id)->update($data);

        // Mengalihkan pengguna ke halaman peserta dengan pesan sukses
        return redirect()->to('peserta')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Menghapus data peserta dari database.
     */
    public function destroy(string $id)
    {
        // Menghapus data peserta berdasarkan ID
        peserta::where('id', $id)->delete();

        return redirect()->to('peserta')->with('success', 'Data berhasil dihapus');
    }
}