<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class customerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        return response()->json($customer);
    }

    public function add(Request $request)
    {
        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'kota' => $request->kota
        ]);
        if ($customer) {
            return response()->json(["message" => "berhasil menambah data"]);
        }
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $customer->nama = $request->nama;
        $customer->email = $request->email;
        $customer->no_telp = $request->no_telp;
        $customer->kota = $request->kota;
        $hasil = $customer->save();
        if ($hasil) {
            return response()->json(["message" => "data berhasil di edit"]);
        }
    }

    public function hapus($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $hasil = $customer->delete();
        if ($hasil) {
            return response()->json(["message" => "data berhasil dihapus"]);
        }
    }
}
