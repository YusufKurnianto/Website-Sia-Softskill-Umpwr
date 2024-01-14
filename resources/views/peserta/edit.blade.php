@extends('layout.peserta')

@section('konten')

<!-- Form untuk mengedit data peserta -->
    <!--<form action='{{ url('peserta/'.$data->id) }}' method='post'>-->
        <form action="{{ url('peserta', $data->id) }}" method="post">



        @csrf <!-- Token CSRF untuk keamanan formulir -->

        <!-- Method HTTP untuk mengirimkan data dengan methode PUT -->
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          
            <!--<div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id' value="" id="id">
                </div>
            </div>-->

            <!-- Input untuk NIM -->
            <div class="row mb-2">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' value="{{ $data->nim }}" id="nim">
                </div>
            </div>

            <!-- Input untuk Nama Lengkap -->
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_lengkap' value="{{ $data->nama_lengkap}}" id="nama_lengkap">
                </div>
            </div>

            <!-- Dropdown untuk Program Studi -->
            <div class="row mb-3">
                <label for="prodi" class="col-sm-2 col-form-label">Program Studi</label>
                <div class="col-sm-10">
                    <select class="form-control" name="prodi" id="prodi">
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                        <option value="Pendidikan Teknik Otomotif">Pendidikan Teknik Otomotif</option>
                        <option value="Pendidikan Guru SD">Pendidikan Guru SD</option>
                        <option value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                        <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        <option value="Pendidikan Bahasa dan Sastra">Pendidikan Bahasa dan Sastra Jawa</option>
                        <option value="Pendidikan Matemetika">Pendidikan Matematika</option>
                        <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                        <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Agribisnis">Agribisnis</option>
                        <option value="Peternakan">Peternakan</option>
                        <option value="Hukum">Hukum</option>
                        <option value="Psikologi">Psikologi</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown untuk Level -->
            <div class="row mb-2">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select class="form-control" name="level" id="level">
                        <option value="Level 1">1</option>
                        <option value="Level 2">2</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown untuk Tahun -->
            <div class="row mb-3">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="2021" {{ (Session::get('tahun') == '2021') ? 'selected' : '' }}>2021</option>
                        <option value="2022" {{ (Session::get('tahun') == '2022') ? 'selected' : '' }}>2022</option>
                        <option value="2023" {{ (Session::get('tahun') == '2023') ? 'selected' : '' }}>2023</option>
                    </select>
                </div>
            </div>
               <!-- Tombol Simpan dan kembali -->
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2"> <!-- Menggunakan offset untuk membuat kolom button tergeser -->
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    <a href='{{ url('peserta') }}' class="btn btn-secondary">KEMBALI</a>
                </div>
            </div>
        </div>
    </form>
@endsection
