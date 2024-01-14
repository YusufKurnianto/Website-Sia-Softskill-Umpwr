<?php

namespace App\Http\Controllers;
use App\Models\Fasilitator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class FasilitatorController extends Controller
{

public function index(Request $request)
{
    $query = Fasilitator::query();

    if ($request->has('search')) {
        $searchTerm = $request->search;

        // Search by nama_lengkap, usia, and no_tempat_duduk
        $query->where('NIDN', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('nama', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('prodi', 'LIKE', '%' . $searchTerm . '%');
    }

    $data = $query->paginate(5);

    return view('datafasilitator', compact('data'));
}


public function tambahfasilitator(){
    return view ('tambahfasilitator');
}

public function insertdata(Request $request){
   // dd($request->all());
   //membuat request data ke databse
    Fasilitator::create($request->all());

    //setelah mengirim akan pindah ke halaman data fasilitator
    return redirect()->route('index')->with('success', 'Data Berhasil Ditambahkan');
}

//Update/Edit
public function tampilkandata($id){

    $decryptID = Crypt::decryptString($id);
    $data = Fasilitator::find($decryptID);
  //cek isi data
 //  dd($data);
   //nama view
    return view ('editfasilitator', compact('data'));
}
public function updatedata(Request $request, $id){
    $data = Fasilitator::find($id);
    $data->update($request->all());
    return redirect()->route('index')->with('success',' Data Berhasil Di Update');

}
public function deletedata($id){
    $data = Fasilitator::find($id);
    $data->delete();
    return redirect()->route('index')->with('success',' Data Berhasil Di Hapus');

}
}