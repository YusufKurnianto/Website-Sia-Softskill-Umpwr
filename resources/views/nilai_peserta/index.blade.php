
<!-- resources/views/nilai_peserta/index.blade.php -->
@extends('layout.templatenilai')

@section('konten')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Peserta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: auto;
            padding: 0;
        }

        .container {
            width:auto;
            height:auto;
  
      
  
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107;
            border: 1px solid #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            border: 1px solid #dc3545;
       
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Daftar Nilai Peserta</h2>

    <!-- Tombol Tambah Nilai Peserta -->
    <a href="{{ route('nilai_peserta.create') }}" class="btn btn-success">Tambah Nilai Peserta</a>

    <!-- Form filter berdasarkan tahun dan level -->
    <form action="{{ route('nilai_peserta.index') }}" method="GET">
        <label for="tahun">Pilih Tahun:</label>
        <select name="tahun" id="tahun">
            <option value="">-- Semua Tahun --</option>
            @foreach ($years as $year)
            <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>

        <label for="level">Pilih Level:</label>
        <select name="level" id="level">
            <option value="">-- Semua Level --</option>
            @foreach ($levels as $level)
            <option value="{{ $level }}" {{ $selectedLevel == $level ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn">Filter</button>
    </form>

    <!-- Tabel untuk menampilkan daftar nilai peserta -->
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Peserta</th>
                <th>Nama Fasilitator</th>
                <th>Nilai Akhir</th>
                <th>Presensi</th>
                <th>Total Nilai</th>
                <th>Konversi Nilai</th>
                <th>Tahun</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaiPesertas as $nilaiPeserta)
            <tr>
                <td>{{ $nilaiPeserta->nim }}</td>
                <td>{{ $nilaiPeserta->nama_peserta }}</td>
                <td>{{ $nilaiPeserta->nama_fasilitator }}</td>
                <td>{{ $nilaiPeserta->nilai_akhir }}</td>
                <td>{{ $nilaiPeserta->presensi }}</td>
                <td>{{ $nilaiPeserta->total_nilai }}</td>
                <td>{{ $nilaiPeserta->konversi_nilai }}</td>
                <td>{{ $nilaiPeserta->tahun }}</td>
                <td>{{ $nilaiPeserta->level }}</td>
                <td>
                    <a href="{{ route('nilai_peserta.edit', $nilaiPeserta->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('nilai_peserta.destroy', $nilaiPeserta->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

</html>
@endsection
