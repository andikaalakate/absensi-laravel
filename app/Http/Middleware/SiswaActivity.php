<?php

namespace App\Http\Middleware;

use App\Models\SiswaLogin;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SiswaActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            SiswaLogin::where('nis', Auth::user()->nis)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}
