<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    /**
     * Tampilkan halaman profil agen berdasarkan kode_agen
     */
    public function show($kode)
    {
        $agen = Agen::where('kode_agen', $kode)->firstOrFail();

        return view('agen.show', compact('agen'));
    }
}
