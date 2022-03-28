<?php

namespace App\Http\Controllers;
use App\Models\buku;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('layouts.frontend', compact('buku'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFaill($id);
        return view('layouts.frontend', compact('buku'));
    }
}
