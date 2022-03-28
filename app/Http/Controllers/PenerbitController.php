<?php

namespace App\Http\Controllers;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    //
    public function index()
    {
        //
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }
    public function create()
    {
        //
        return view('penerbit.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_penerbit' => 'required|max:255',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required|numeric',

        ];

        $message = [
            'nama_penerbit.required' => 'nama penerbit harus diisi',
            'nama_penerbit.numeric' => 'nama penerbit tidak boleh angka',
            'nama_penerbit.max' => 'nama kategori maksimal 255 karakter',
            'alamat.required' => 'alamat harus diisi',
            'email.required' => 'alamat harus di isi',
             'no_tlp.required' => 'no telepon harus diisi',
            'no_tlp.numeric' => 'hanya boleh diisi oleh angka',

        ];

         $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }


        //validasi data
        $validated = $request->validate([
            'nama_penerbit' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
        ]);

        $penerbit = new Penerbit;
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->email = $request->email;
        $penerbit->no_tlp = $request->no_tlp;
        $penerbit->save();
        Alert::success('Data '.$penerbit->nama_penerbit.' Berhasil Ditambahkan');
        return redirect()->route('penerbit.index');
    }
    public function show($id)
    {
        //
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }
    public function edit($id)
    {
        //
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
    }
    public function update(Request $request, $id)
    {
         $rules = [
            'nama_penerbit' => 'required|max:255',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required|numeric',

        ];

        $message = [
            'nama_penerbit.required' => 'nama penerbit harus diisi',
            'nama_penerbit.numeric' => 'nama penerbit tidak boleh angka',
            'nama_penerbit.max' => 'nama kategori maksimal 255 karakter',
            'alamat.required' => 'alamat harus diisi',
            'email.required' => 'alamat harus di isi',
             'no_tlp.required' => 'no telepon harus diisi',
            'no_tlp.numeric' => 'hanya boleh diisi oleh angka',

        ];

         $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }
        //
        $validated = $request->validate([
            'nama_penerbit' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->email = $request->email;
        $penerbit->save();
        Alert::success('Data '.$penerbit->nama_penerbit.' Berhasil Diedit');
        return redirect()->route('penerbit.index');

    }
    public function destroy($id)
    {
        $penerbit = Penerbit::find($id);
        if (!Penerbit::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Mengapus Data '. $penerbit->nama_penerbit);
            return redirect()->back();
        }
    }

}
