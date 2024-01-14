@extends('layout.peserta')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
     <!-- JUDUL TABEL -->
      <h1 class="text-center mb-3">Daftar Peserta</h1> 
<!-- FORM PENCARIAN -->
<div class="container mt-4">
        <!-- Konten lainnya -->

        <!-- Form Logout -->
        <form action="/logout" method="post">
            @csrf
            
        </form>
    </div>
<div class="pb-3">
    <!-- Form untuk melakukan pencarian dengan metode GET -->
    <form class="d-flex" action="{{ url('peserta')}}" method="get">
        <!-- Kolom pencarian NIM atau Nama -->
        <div class="input-group me-1">
            <label class="input-group-text" for="katakunci">Nim/Nama</label>
            <input class="form-control" type="search" name="katakunci" id="katakunci" value="{{ Request::get('katakunci') }}" placeholder="NIM atau Nama" aria-label="Search">
        </div>

        <!-- Dropdown untuk Level -->
        <div class="input-group me-1">
            <label class="input-group-text" for="level">Level</label>
            <select class="form-select" name="level" id="level">
                <option value="" disabled selected>Pilih Level</option>
                <option value="1" {{ (request()->get('level') == '1') ? 'selected' : '' }}>1</option>
                <option value="2" {{ (request()->get('level') == '2') ? 'selected' : '' }}>2</option>
            </select>
        </div>

        <!-- Dropdown untuk Tahun -->
        <div class="input-group me-1">
            <label class="input-group-text" for="tahun">Tahun</label>
            <select class="form-select" name="tahun" id="tahun">
                <option value="" disabled selected>Pilih Tahun</option>
                <option value="2021" {{ (request()->get('tahun') == '2021') ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ (request()->get('tahun') == '2022') ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ (request()->get('tahun') == '2023') ? 'selected' : '' }}>2023</option>
            </select>
        </div>

        <button class="btn btn-secondary" type="submit">Cari</button>
    </form>
</div>

        
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <!-- Tombol untuk menuju halaman penambahan data -->
            <a href='{{ url('peserta/create')}}' class="btn btn-primary">+ Tambah Data</a>
        </div>
  
       <!-- TABEL DATA -->
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">No</th>
            <th class="col-md-3">NIM</th>
            <th class="col-md-4">Nama Lengkap</th>
            <th class="col-md-2">Program Studi</th>
            <th class="col-md-2">Level</th>
            <th class="col-md-2">Tahun</th>
            <th class="col-md-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Looping untuk menampilkan data dari variabel $data -->
        @foreach ($data as $item)
        <tr>
            <!-- Kolom "No" -->
            <td>{{ $startNumber++ }}</td>
            <td>{{ $item->nim }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->prodi }}</td>
            <td>{{ $item->level }}</td>
            <td>{{ $item->tahun }}</td>
            <td>
                
                <!-- Grup tombol untuk Edit dan Delete -->
                <div class="btn-group">
                    <!-- Tombol untuk menuju halaman edit data -->
                    <!--<a href="/peserta/edit/{{ Crypt::encryptString($item->id) }}" class="btn btn-sm btn-warning">Edit</a>-->
                    <a href="{{ url('peserta', Crypt::encryptString($item->id)) }}/edit" class="btn btn-sm btn-warning">Edit</a>

    
                    <!-- Form untuk meng-handle penghapusan data -->
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('peserta/'.$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Tombol untuk mengirimkan formulir penghapusan -->
                        <button type="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </div>
            </td>
        </tr>
        
    @endforeach
    </tbody>
    
</table>
@if(isset($notFoundMessage))
<div class="alert alert-warning mt-3">
    {{ $notFoundMessage }}
</div>
@endif
<!-- untuk menampilkan link paginasi pada tampilan -->
{{ $data->withQueryString()->links() }}

    </div>
    <!-- AKHIR DATA -->
  
@endsection
