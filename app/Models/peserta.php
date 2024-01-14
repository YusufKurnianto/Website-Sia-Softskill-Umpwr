<?php

namespace App\Models;

use App\Models\peserta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan model dgn nama kelas 'peserta
class peserta extends Model
{
    // Menggunakan trait HasFactory untuk menghasilkan data dummy dengan mudah
    use HasFactory;
     // Menentukan kolom yang dapat diisi (fillable) pada model
    protected $fillable = ['id', 'nim', 'nama_lengkap', 'prodi', 'level', 'tahun'];
     // Menentukan nama tabel yang terkait dengan model
    protected $table = 'peserta';
    // Menonaktifkan timestamps (created_at dan updated_at) pada tabel
    public $timestamps = false;
}
