<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Buku;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('kategori', 'pengarang', 'penerbit')->get();
        return view('buku.index', compact('buku'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori', 'pengarang', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'judul' => 'required',
        //     'deskripsi' => 'required|max:255',
        //     'stok' => 'required|numeric|max:2048',
        //     'harga' => 'required|numeric',
        //     'gambar' => 'required|image|max:2048',
        // ];

        // $message = [
        //     'judul' => 'judul harus diisi',
        //      'deskripsi.required' => 'deskripsi harus di isi',
        //      'deskripsi.max' => 'deskripsi maksimal 255 karakter',
        //     'stok.numeric' => 'hanya boleh di isi oleh angka',
        //     'stok.required' => 'stok harus di isi',
        //     'harga.required' => 'harga harus di isi',
        //     'harga.numeric' => 'hanya boleh di isi oleh angka',
        //     'gambar.required' => 'gambar harus di isi',
        //     'gambar.image' => 'file harus bersifat foto',
        // ];

        // $validation = Validator::make($request->all(), $rules, $message);
        // if ($validation->fails()) {
        //     Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
        //     return back()->withErrors($validation)->withInput();
        // }
        $validated = $request->validate([
            'judul' => 'required',
            'nama_kategori' => 'required',
            'nama_pengarang' => 'required',
            'nama_penerbit' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',

        ]);

        $buku = new Buku;
        $buku->kode_buku = mt_rand(1000,9999);
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->nama_kategori = $request->nama_kategori;
        $buku->nama_pengarang = $request->nama_pengarang;
        $buku->nama_penerbit = $request->nama_penerbit;
        $buku->stok = $request->stok;
        $buku->harga = $request->harga;
        if ($request->hasFile('cover')) {
            $buku->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/buku', $name);
            $buku->cover = $name;
        }
        Alert::success('Data '.$buku->judul.' Berhasil Ditambahkan');
        $buku->save();
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $buku = Buku::findOrFail($id);
        $pengarang = Pengarang::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku','pengarang' ,'kategori','penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validasi data
        $validated = $request->validate([
            'judul' => 'required',
            'nama_kategori' => 'required',
            'nama_pengarang' => 'required',
            'nama_penerbit' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->nama_kategori = $request->nama_kategori;
        $buku->nama_pengarang = $request->nama_pengarang;
        $buku->nama_penerbit = $request->nama_penerbit;
        $buku->stok = $request->stok;
        $buku->harga = $request->harga;
        if ($request->hasFile('cover')) {
            $buku->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/buku', $name);
            $buku->cover = $name;
        }
        $buku->save();
        Alert::success('Data '.$buku->judul.' Berhasil Diedit');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $buku = Buku::find($id);
        if (!Buku::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Mengapus Data '. $buku->judul);
            return redirect()->back();
        }
    }
}
