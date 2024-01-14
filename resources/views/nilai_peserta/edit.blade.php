<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai Peserta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
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

        button:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Nilai Peserta</h2>

        <form action="{{ route('nilai_peserta.update', $nilaiPeserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" name="nim" id="nim" value="{{ $nilaiPeserta->nim }}" required>
            </div>

            <div class="form-group">
                <label for="nama_peserta">Nama Peserta:</label>
                <input type="text" name="nama_peserta" id="nama_peserta" value="{{ $nilaiPeserta->nama_peserta }}" required>
            </div>

            <div class="form-group">
                <label for="nama_fasilitator">Nama Fasilitator:</label>
                <input type="text" name="nama_fasilitator" id="nama_fasilitator" value="{{ $nilaiPeserta->nama_fasilitator }}" required>
            </div>

            <div class="form-group">
                <label for="nilai_akhir">Nilai Akhir:</label>
                <input type="text" name="nilai_akhir" id="nilai_akhir" value="{{ $nilaiPeserta->nilai_akhir }}" required>
            </div>

            <div class="form-group">
                <label for="presensi">Presensi:</label>
                <input type="text" name="presensi" id="presensi" value="{{ $nilaiPeserta->presensi }}" required>
            </div>

            <div class="form-group">
                <label for="total_nilai">Total Nilai:</label>
                <input type="text" name="total_nilai" id="total_nilai" value="{{ $nilaiPeserta->total_nilai }}" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <select name="tahun" id="tahun">
                    <option value="2022" {{ $nilaiPeserta->tahun == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ $nilaiPeserta->tahun == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ $nilaiPeserta->tahun == '2024' ? 'selected' : '' }}>2024</option>
                </select>
            </div>

            <div class="form-group">
                <label for="level">Level:</label>
                <select name="level" id="level">
                    <option value="A" {{ $nilaiPeserta->level == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $nilaiPeserta->level == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $nilaiPeserta->level == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>