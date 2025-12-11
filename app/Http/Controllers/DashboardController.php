<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Redirect agent to their dashboard
        if (auth()->check() && auth()->user()->isAgent()) {
            return redirect()->route('agent.dashboard');
        }

        $query = Agen::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kode_agen', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $agens = $query->latest()->paginate(12)->withQueryString();
        
        return view('dashboard', compact('agens'));
    }
}
