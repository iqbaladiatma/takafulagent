<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agens = Agen::latest()->paginate(12);
        return view('dashboard', compact('agens'));
    }
}
