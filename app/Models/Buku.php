<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = [ 'kode_buku','judul','nama_kategori','nama_pengarang' ,'nama_penerbit','deskripsi', 'stok', 'harga', 'cover' ];
    protected $visible = ['id','kode_buku','judul', 'nama_kategori','nama_pengarang' ,'nama_penerbit','deskripsi', 'stok', 'harga', 'cover' ];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','nama_kategori');
    }
    public function pengarang()
    {
        return $this->belongsTo('App\Models\Pengarang','nama_pengarang');
    }
    public function penerbit()
    {
        return $this->belongsTo('App\Models\Penerbit','nama_penerbit');
    }
    public function transaksi()
    {
    return $this->hasMany('App\Models\Transaksi','buku_id');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($buku) {
            if ($buku->transaksi->count() > 0) {
                Alert::error('Gagal Menghapus', 'Data '.$buku->buku_id.' Masih Memiliki Data');
                return false;
            }
        });
    }
    public function image()
    {
        if ($this->cover && file_exists(public_path('images/buku/' . $this->cover))) {
            return asset('images/buku/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/buku/' . $this->cover))) {
            return unlink(public_path('images/buku/' . $this->cover));
        }
    }
}
