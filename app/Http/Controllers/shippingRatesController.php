<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingRates;

class shippingRatesController extends Controller
{
    public function index()
    {
        $shipping_rates = ShippingRates::with(['relasi_asal', 'relasi_tujuan'])->get();
        return response()->json($shipping_rates);
    }

    public function show($id)
    {
        $shipping_rates = ShippingRates::find($id);
        if (!$shipping_rates) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        return response()->json($shipping_rates);
    }

    public function add(Request $request)
    {
        $shipping_rates = ShippingRates::create([
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'layanan' => $request->layanan,
            'harga' => $request->harga,
            'estimati' => $request->estimati,
        ]);
        if ($shipping_rates) {
            return response()->json(["message" => "berhasil menambah data"]);
        }
    }

    public function edit(Request $request, $id){
        $shipping_rates = ShippingRates::find($id);
        if(!$shipping_rates) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $shipping_rates->asal = $request->asal;
        $shipping_rates->tujuan = $request->tujuan;
        $shipping_rates->layanan = $request->layanan;
        $shipping_rates->harga = $request->harga;
        $shipping_rates->estimati = $request->estimati;
        $hasil = $shipping_rates->save();

        if($hasil) {
            return response()->json(["message" => "berhasil edit data"]);
        }
    }

    public function hapus($id)
    {
        $shipping_rates = ShippingRates::find($id);
        if (!$shipping_rates) {
            return response()->json(["message" => "data tidak ditemukan"]);
        }
        $hasil = $shipping_rates->delete();
        if ($hasil) {
            return response()->json(["message" => "berhasil menghapus data"]);
        }
    }
}
