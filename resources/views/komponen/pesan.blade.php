@if (Session::has('success'))
<!-- Menampilkan pemberitahuan sukses jika sesi 'success' ada -->
<div class="pt-3">
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if ($errors->any())
<!-- Menampilkan pesan kesalahan jika terdapat kesalahan validasi pada formulir -->
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                <!-- Looping melalui semua kesalahan dan ditampilkan sebagai daftar kesalahan -->
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif