<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = "pembeli";
    protected $fillable = ['kode_pembeli','nama_pembeli', 'alamat', 'no_hp'];
    protected $visible = ['kode_pembeli','nama_pembeli', 'alamat', 'no_hp'];
    public $timestamps = true;

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'pembeli_id');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($pembeli) {
            if ($pembeli->transaksi->count() > 0) {
                Alert::error('Gagal Menghapus', 'Data Pembeli'.$pembeli->pembeli_id.' Masih Memiliki Data');
                return false;
            }
        });
    }
}
