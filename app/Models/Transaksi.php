<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";

    protected $fillable = ['buku_id', 'nama', 'kode_pembeli' ,'tgl_beli' ,'jumlah_buku', 'total','uang','kembalian'];
    protected $visible = ['buku_id', 'nama', 'kode_pembeli' ,'tgl_beli' ,'jumlah_buku', 'total','uang','kembalian'];
    public $timestamps = true;

    public function buku()
    {
        return $this->belongsTo('App\Models\Buku', 'buku_id');

    }
    // public function pembeli()
    // {
    //     return $this->belongsTo('App\Models\Pembeli', 'pembeli_id');
    // }
      public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'buku_id');
    }
}
