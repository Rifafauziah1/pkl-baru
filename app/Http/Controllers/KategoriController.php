<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|max:255|unique:kategori|alpha',

        ];

        $message = [
            'nama_kategori.required' => 'nama kategori harus di isi',
            'nama_kategori.alpha' => 'hanya boleh di isi oleh huruf',
            'nama_kategori.unique' => 'nama kategori sudah digunakan',
            'nama_kategori.max' => 'nama kategori maksimal 255 karakter',

        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }
        //validasi data
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = new Kategori;
        $kategori->kode_kategori = mt_rand(1000,9999);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Data '.$kategori->nama_kategori.' Berhasil Ditambahkan');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->kode_kategori = mt_rand(1000,9999);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Data '.$kategori->nama_kategori.' Berhasil Diedit');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Kategori::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Mantap', 'Data berhasil dihapus');
        return redirect()->route('kategori.index');
    }
}
