<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use App\Models\ProfileVisit;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AgenController extends Controller
{
    /**
     * Tampilkan halaman daftar semua agen
     */
    public function index()
    {
        $agens = Agen::with('user')
            ->orderBy('nama')
            ->get();

        return view('agen.index', compact('agens'));
    }

    /**
     * Tampilkan halaman profil agen berdasarkan kode_agen
     */
    public function show($kode, Request $request)
    {
        $agen = Agen::where('kode_agen', $kode)->firstOrFail();

        // Track visit (avoid duplicate visits from same IP within 1 hour)
        $this->trackVisit($agen, $request);

        return view('agen.show', compact('agen'));
    }

    /**
     * Track profile visit
     */
    private function trackVisit(Agen $agen, Request $request)
    {
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();
        $referer = $request->header('referer');

        // Check if same IP visited within last hour to avoid spam
        $recentVisit = ProfileVisit::where('agen_id', $agen->id)
            ->where('ip_address', $ipAddress)
            ->where('visited_at', '>=', Carbon::now()->subHour())
            ->first();

        if (!$recentVisit) {
            ProfileVisit::create([
                'agen_id' => $agen->id,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'referer' => $referer,
                'visited_at' => Carbon::now(),
            ]);
        }
    }
}
