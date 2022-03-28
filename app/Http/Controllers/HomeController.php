<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $chart = [];
        $jumlah_buku = [];
        foreach($transaksi as $penjualan) {
            $chart[] = $penjualan->created_at->format('d M');
            $jumlah_buku[] = $penjualan->jumlah_buku;
        }
        return view('home', compact('chart','jumlah_buku'));
    }
}
