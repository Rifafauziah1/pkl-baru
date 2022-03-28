<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('name', 'Rifa Fauziah')->get();

        if ($user->count() >= 1){
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Berhasil',
                'data' => $user,
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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'success' => true,
            'mesage' => 'Data User Berhasil dibuat',
            'data' => $user,
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
        $user = User::findOrFail($id);
        if ($user){
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Berhasil',
                'data' => $user,
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
        $user = User::findOrFail($id);
        if ($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'success' => true,
                'mesage' => 'Data User Berhasil dibuat',
                'data' => $user,
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
        $user = User::findOrFail($id);
        if ($user){
            $user->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data User Berhasl Dihapus',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
