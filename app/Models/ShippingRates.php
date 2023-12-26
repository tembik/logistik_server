<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRates extends Model
{
    use HasFactory;

    protected $table = 'shipping_rates';

    protected $fillable = ['asal', 'tujuan', 'layanan', 'harga', 'estimati'];

    public function relasi_asal(){
        return $this->belongsTo(Alamat::class, 'asal', 'id')->select(['id', 'nama']);
    }

    public function relasi_tujuan(){
        return $this->belongsTo(Alamat::class, 'tujuan', 'id')->select(['id', 'nama']);
    }
}
