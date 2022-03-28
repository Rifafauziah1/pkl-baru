<?php

namespace App\Http\Controllers;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PembeliController extends Controller
{
    public function index()
    {
        //
        $pembeli = Pembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }
    public function create()
    {
        //
        return view('pembeli.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_pembeli' => 'required|max:255',
            'alamat' => 'required',
            'no_hp' => 'required',

        ];

        $message = [
            'nama_pembeli.required' => 'nama pembeli harus di isi',
            'nama_pembeli.max' => 'nama pembeli maksimal 255 karakter',
            'alamat.required' => 'alamat harus di isi',
            'no_hp.required' => 'no handphone  harus di isi',

        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }
        //validasi data
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $pembeli = new Pembeli;
        $pembeli->kode_pembeli = mt_rand(1000,9999);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        Alert::success('Data Transaksi Berhasil Ditambah');
        $pembeli->save();
        return redirect()->route('pembeli.index');
    }
    public function show($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }
    public function edit($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->kode_pembeli = mt_rand(1000,9999);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        Alert::success('Data Transaksi Berhasil Diedit');
        $pembeli->save();
        return redirect()->route('pembeli.index');

    }
    public function destroy($id)
    {
               if (!Pembeli::destroy($id)) {
            return redirect()->back();
        }
        Alert::success( 'Data berhasil dihapus');
        return redirect()->route('pembeli.index');
    }
}
