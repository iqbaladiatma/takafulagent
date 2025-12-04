<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalAgen = Agen::count();
        $featuredAgens = Agen::latest()->take(6)->get();
        
        return view('welcome', compact('totalAgen', 'featuredAgens'));
    }
}
