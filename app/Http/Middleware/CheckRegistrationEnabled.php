<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegistrationEnabled
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('registration.enabled', false)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Registration is currently disabled.'], 403);
            }
            
            return redirect()->route('login')->with('error', 'Pendaftaran saat ini dinonaktifkan. Silakan hubungi administrator.');
        }

        return $next($request);
    }
}