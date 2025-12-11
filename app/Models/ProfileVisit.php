<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProfileVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'agen_id',
        'ip_address',
        'user_agent',
        'referer',
        'country',
        'city',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    /**
     * Get unique visitors count for an agent
     */
    public static function getUniqueVisitors($agenId, $days = 30)
    {
        return static::where('agen_id', $agenId)
            ->where('visited_at', '>=', Carbon::now()->subDays($days))
            ->distinct('ip_address')
            ->count('ip_address');
    }

    /**
     * Get total visits count for an agent
     */
    public static function getTotalVisits($agenId, $days = 30)
    {
        return static::where('agen_id', $agenId)
            ->where('visited_at', '>=', Carbon::now()->subDays($days))
            ->count();
    }

    /**
     * Get visits by date for chart
     */
    public static function getVisitsByDate($agenId, $days = 7)
    {
        return static::where('agen_id', $agenId)
            ->where('visited_at', '>=', Carbon::now()->subDays($days))
            ->selectRaw('DATE(visited_at) as date, COUNT(*) as visits')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }
}