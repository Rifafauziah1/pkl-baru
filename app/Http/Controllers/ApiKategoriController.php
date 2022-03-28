<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::where('id', 1)->get();

        if ($kategori->count() >= 1){
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Berhasil',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Gagal',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->kode_kategori = $request->kode_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'mesage' => 'Data Kategori Berhasil dibuat',
            'data' => $kategori,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori){
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Berhasil',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Gagal',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori){
            $kategori->kode_kategori = $request->kode_kategori;
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'success' => true,
                'mesage' => 'Data Kategori Berhasil dibuat',
                'data' => $kategori,
            ], 201);

        }else{
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Gagal',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori){
            $kategori->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data Kategori Berhasl Dihapus',
                'data' => $kategori,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Kategori Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
