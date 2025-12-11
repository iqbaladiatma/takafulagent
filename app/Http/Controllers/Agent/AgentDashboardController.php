<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\ChangeRequest;
use App\Models\ProfileVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgentDashboardController extends Controller
{
    public function __construct()
    {
        // Middleware akan ditangani di routes
    }

    public function index()
    {
        $user = Auth::user();
        
        // Check if user is agent and has agen profile
        if (!$user->isAgent() || !$user->agen) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda bukan agen atau profil agen belum diatur.');
        }
        
        $agen = $user->agen;

        // Statistik pengunjung
        $stats = [
            'unique_visitors_30' => ProfileVisit::getUniqueVisitors($agen->id, 30),
            'total_visits_30' => ProfileVisit::getTotalVisits($agen->id, 30),
            'unique_visitors_7' => ProfileVisit::getUniqueVisitors($agen->id, 7),
            'total_visits_7' => ProfileVisit::getTotalVisits($agen->id, 7),
            'total_products' => $agen->products()->count(),
            'products_with_image' => $agen->products()->whereNotNull('gambar')->count(),
        ];

        // Data kunjungan untuk chart (7 hari terakhir)
        $visitData = ProfileVisit::getVisitsByDate($agen->id, 7);
        
        // Request yang pending
        $pendingRequests = $agen->changeRequests()
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        // Recent requests
        $recentRequests = $agen->changeRequests()
            ->latest()
            ->take(10)
            ->get();

        return view('agent.dashboard', compact('agen', 'stats', 'visitData', 'pendingRequests', 'recentRequests'));
    }

    public function profile()
    {
        $user = Auth::user();
        
        // Check if user is agent and has agen profile
        if (!$user->isAgent() || !$user->agen) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda bukan agen atau profil agen belum diatur.');
        }
        
        $agen = $user->agen;

        return view('agent.profile', compact('agen'));
    }

    public function requests()
    {
        $user = Auth::user();
        
        // Check if user is agent and has agen profile
        if (!$user->isAgent() || !$user->agen) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda bukan agen atau profil agen belum diatur.');
        }
        
        $agen = $user->agen;

        $requests = $agen->changeRequests()
            ->with(['product', 'approvedBy'])
            ->latest()
            ->paginate(10);

        return view('agent.requests', compact('agen', 'requests'));
    }

    public function createRequest()
    {
        $user = Auth::user();
        
        // Check if user is agent and has agen profile
        if (!$user->isAgent() || !$user->agen) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda bukan agen atau profil agen belum diatur.');
        }
        
        $agen = $user->agen;

        return view('agent.create-request', compact('agen'));
    }

    public function storeRequest(Request $request)
    {
        $user = Auth::user();
        
        // Check if user is agent and has agen profile
        if (!$user->isAgent() || !$user->agen) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda bukan agen atau profil agen belum diatur.');
        }
        
        $request->validate([
            'type' => 'required|in:profile,product_add,product_edit,product_delete',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'product_id' => 'nullable|exists:products,id',
            'requested_data' => 'nullable|array',
        ]);

        $agen = $user->agen;

        // Validasi product_id jika ada
        if ($request->product_id) {
            $product = $agen->products()->find($request->product_id);
            if (!$product) {
                return back()->with('error', 'Produk tidak ditemukan atau bukan milik Anda.');
            }
        }

        ChangeRequest::create([
            'agen_id' => $agen->id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'product_id' => $request->product_id,
            'requested_data' => $request->requested_data,
        ]);

        return redirect()->route('agent.requests')->with('success', 'Request berhasil dikirim ke admin.');
    }
}