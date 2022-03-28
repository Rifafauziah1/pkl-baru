<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = "pengarang";
    protected $fillable = ['nama_pengarang', 'alamat', 'email'];
    protected $visible = ['nama_pengarang', 'alamat', 'email'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_pengarang');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($pengarang) {
            if ($pengarang->buku->count() > 0) {
                Alert::error('Gagal Menghapus', 'Data '.$pengarang->nama_pengarang.' Masih Memiliki Data');
                return false;
            }
        });
    }

}
