<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;

class alamatController extends Controller
{
    public function index()
    {
        $alamat = Alamat::all();
        return response()->json($alamat);
    }

    public function show($id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        return response()->json($alamat);
    }

    public function add(Request $request)
    {
        $alamat = Alamat::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
        if ($alamat) {
            return response()->json(["message" => "berhasil menambah data"]);
        }
    }

    public function edit(Request $request, $id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $alamat->nama = $request->nama;
        $alamat->deskripsi = $request->deskripsi;    
        $hasil = $alamat->save();
        if ($hasil) {
            return response()->json(["message" => "data berhasil di edit"]);
        }
    }

    public function hapus($id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $hasil = $alamat->delete();
        if ($hasil) {
            return response()->json(["message" => "data berhasil dihapus"]);
        }
    }
}
