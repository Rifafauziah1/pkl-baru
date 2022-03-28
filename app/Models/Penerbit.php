<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
class Penerbit extends Model
{
    use HasFactory;
    protected $table = "penerbit";
    protected $fillable = ['nama_penerbit', 'alamat', 'email'];
    protected $visible = ['nama_penerbit', 'alamat', 'email'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_penerbit');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($penerbit) {
            if ($penerbit->buku->count() > 0) {
                Alert::error('Gagal Menghapus', 'Data '.$penerbit->nama_penerbit.' Masih Memiliki Data');
                return false;
            }
        });
    }

}
