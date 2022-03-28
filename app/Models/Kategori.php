<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = ['id','kode_kategori', 'nama_kategori'];
    protected $visible = ['id','kode_kategori', 'nama_kategori'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_kategori');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($kategori) {
            if ($kategori->buku->count() > 0) {
                Alert::error('Ups Data '.$kategori->nama_kategori.' tidak bisa dihapus');
                return false;
            }
        });
    }
  }

