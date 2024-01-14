@extends('layout.fasilitatormenu')
@section('konten')

<center><h1>Data Fasilitator</h1></center>
<br>

<nav class="navbar bg-body-tertiary">
<a href="/tambahfasilitator" type="button" class="btn btn-primary">+ Tambah Data</a>
<form class="d-flex" action="/fasilitator" method="GET" role="search">

  <input class="form-control me-2" type="search" name="search" aria-label="Search" placeholder="Cari">
  <button class="btn btn-outline-dark" type="submit">Cari</button>
</form>
</nav>
        <div class="mb-3 align-items-center mt-2">


            <form action="/fasilitator" method="GET">
        <!--    <input type="search" name="search" class="form-control" id="exampleInputPassword1">-->
        </form>
        </div>

        <!--<div class="row">-->
        <!--    @if (session('success'))-->
        <!--        <div class="alert alert-success" role="alert">-->
        <!--            {{ session('success') }}-->
        <!--        </div>-->
        <!--    @endif-->
        <!--</div>-->

        <table class="table table-striped">
                <thead>
                  <tr><!-- Menampilkan Nama Judul kolom -->
                    <th  style="background-color: #007bff; color:white" scope="col">No</th>
                    <th  style="background-color: #007bff; color:white" scope="col"></th>
                    <th  style="background-color: #007bff; color:white" scope="col">NIDN</th>
                    <th  style="background-color: #007bff; color:white" scope="col">Nama Lengkap</th>
                    <th  style="background-color: #007bff; color:white" scope="col">Prodi</th>
                    <th  style="background-color: #007bff; color:white" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row) <!-- Menggunakan metode foreach -->
                    <tr>
                        <th scope="row">{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</th>
                        <th></th> <!-- menampilkan data ke tabel-->
                        <td>{{$row->NIDN}}</td>            <!-- mengambil isi tabel dan menampilkan nidn -->
                        <td>{{$row->nama}}</td>            <!-- mengambil isi tabel dan menampilkan nama -->
                        <td>{{$row->prodi}}</td>           <!-- mengambil isi tabel dan menampilkan prodi -->
                        <td>
                            <a href="/deletedata/{{$row->id}}" class="btn btn-danger">Del</button>
                          <!--   <a href="/tampilkandata/{{$row->id}}" class="btn btn-warning"> </button> -->
                            <a href="{{route('edit',Crypt::encryptString($row->id))}}" class="btn btn-warning">Edit</a>
                            </td>
                      </tr>
                    @endforeach

                </tbody>

              </table>
              {{$data->links()}}
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  @endsection