<?php

namespace App\Http\Controllers;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function index()
    {
        //
        $pengarang = Pengarang::all();
        return view('pengarang.index', compact('pengarang'));
    }
    public function create()
    {
        //
        return view('pengarang.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_pengarang' => 'required',
            'alamat' => 'required',
            'email' => 'required',

        ];

        $message = [
            'nama_pengarang.required' => 'nama pengarang harus diisi',
           // 'nama_pengarang.alpha' => 'nama pengarang dengan huruf',
            'alamat.required' => 'alamat harus diisi',
            'alamat.alpha' => 'alamat harus diisi oleh huruf',
            'email.required' => 'alamat harus di isi',
           // 'email.alpha' => 'alamat harus diisi dengan huruf',

        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }
        //validasi data
        $validated = $request->validate([
            'nama_pengarang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $pengarang = new Pengarang;
        $pengarang->nama_pengarang = $request->nama_pengarang;
        $pengarang->alamat = $request->alamat;
        $pengarang->email = $request->email;
        $pengarang->save();
        Alert::success('Data '.$pengarang->nama_pengarang.' Berhasil Ditambahkan');
        return redirect()->route('pengarang.index');
    }
    public function show($id)
    {
        //
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.show', compact('pengarang'));
    }
    public function edit($id)
    {
        //
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang'));
    }
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_pengarang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $pengarang = Pengarang::findOrFail($id);
        $pengarang->nama_pengarang = $request->nama_pengarang;
        $pengarang->alamat = $request->alamat;
        $pengarang->email = $request->email;
        $pengarang->save();
        Alert::success('Data '.$pengarang->nama_pengarang.' Berhasil Diedit');
        return redirect()->route('pengarang.index');

    }
    public function destroy($id)
    {
        $pengarang = Pengarang::find($id);
        if (!Pengarang::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Mengapus Data '. $pengarang->nama_penerbit);
            return redirect()->back();
        }
    }

}
