<?php

use App\Http\Controllers\Transaksi;
namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Transaksi;
//use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('buku')->get();
        return view('transaksi.index', compact('transaksi'));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $laporan = Transaksi::all();
        return view("transaksi.laporan", compact("laporan"));
    }
    public function create()
    {
        //
        $buku = Buku::all();
       // $pembeli = Pembeli::all();
        return view('transaksi.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $buku = Buku::find($request->buku_id);

        // $rules = [
        //     'tanggal' => 'required',
        //     'nama' => 'required',
        //     'buku_id' => 'required',
        //     'jumlah_buku' => 'required|min:1|max:' . $buku->stok,
        //     'uang' => 'required',
        // ];

        // $message = [
        //     'tanggal.required' => 'tanggal harus diisi',
        //     'nama.required' => 'nama harus diisi',
        //     'buku_id.required' => 'harus diisi',
        //     'jumlah_buku.required' => 'jumlah buku  harus di isi',
        //     'uang.required' => 'uang harus diisi',
        // ];
        // $validation = Validator::make($request->all(), $rules, $message);
        // if ($validation->fails()) {
        //     Alert::error('Oops', 'Data yang anda input tidak valid, silahkan diulang')->autoclose(2000);
        //     return back()->withErrors($validation)->withInput();
        // }
    //   $buku = Buku::findOrFail($request->buku_id);
    //      Alert::error('Oops', 'Stok yang tersedia hanya '.$buku->stok. '')->autoclose(2000);

    //         $validated = $request->validate([
    //         //'pembeli_id' => 'required',
    //         'buku_id' => 'required',
    //         'nama' => 'required',
    //         //'harga' => 'required',
    //         'tgl_beli' => 'required',
    //         'jumlah_buku' => 'numeric|min:1|max:'.$buku->stok,
    //         'total' => 'required',
    //         'uang' => 'required',

    //     ]);

        $transaksi = new Transaksi;
       // $transaksi->pembeli_id = $request->pembeli_id;
       $transaksi->kode_pembeli =  mt_rand(1000,9999);
       $transaksi->tgl_beli = $request->tgl_beli;
       $transaksi->nama = $request->nama;
        $transaksi->buku_id = $request->buku_id;
        $transaksi->jumlah_buku = $request->jumlah_buku;
        //$transaksi->harga = $request->harga;
        $transaksi->total = $transaksi->buku->harga * $transaksi->jumlah_buku;
        // $price = Buku::findOrfail($request->buku_id);
        // $transaksi->harga = $price->harga;
        // $transaksi->total = $price->harga * $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        if ($transaksi->uang < $transaksi->total) {
            Alert::error('Maaf', 'Uang Yang Anda Masukan Kurang');
            return redirect()->back();
        } else {
            $transaksi->save();
        }

        $buku = Buku::findOrFail($request->buku_id);
        $buku->stok -= $request->jumlah_buku;
        $buku->save();
        $transaksi->save();

        Alert::success('Data Transaksi Berhasil Ditambahkan');
        if (is_countable($request['buku_id']) && count($request['buku_id']) > 0) {
            foreach ($request['buku_id'] as $item => $value) {
                $transaksi = new Transaksi();
                $transaksi->buku_id = $request['buku_id'][$item];
                $slug = Str::slug($request['buku_id'][$item]);
                $transaksi->slug = $slug;

                $transaksi->save();
            }
        }
        Alert::success('Transaksi Buku', 'Berhasil')->autoclose(3000);

        // Session::flash("flash_notification", [
            //     "level" => "success",
            //     "message" => "Berhasil Menyimpan Kategori Baru",
            // ]);
            return redirect()->route('transaksi.index');

        }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $buku = Buku::all();
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();
        //$pembeli = Pembeli::all();
        return view('transaksi.edit', compact('buku','transaksi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'jumlah_buku' => 'required',
            'uang' => 'required',
         ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->buku_id = $request->buku_id;
        $transaksi->pembeli_id = $request->pembeli_id;
        $transaksi->jumlah_buku = $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $price = Buku::findOrfail($request->buku_id);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        Alert::success('Data Transaksi Berhasil Diedit');
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if (!Transaksi::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Mengapus Data '. $transaksi->nama_penerbit);
            return redirect()->back();
        }
    }
//    public function insert(Request $request)
//  {
//    // Begin Transaction
//    DB::beginTransaction();
//    try {
//        DB::table('transaksi')->update(['is_comment' => 0]);
//        DB::table('comment')->delete();

//        // Commit Transaction
//        DB::commit();
//        // Semua proses benar
//    } catch (Transaksi $e) {
//        // Rollback Transaction
//        DB::rollback();
//        // ada yang error
//     }
//     $transaksi = Transaksi::find(1);
//     DB::transaction(function() use ($transaksi, $request) {
//       // insert post
//       $post = new Transaksi;
//       $post->judul = $request->input('judul');
//       $post->jumlah_buku = $request->input('jumlah_buku');
//       $post->save();
//       // update data user
//       $transaksi->total_post = $transaksi->total_post + 1;
//       $transaksi->save();
//      });
//    }
}

