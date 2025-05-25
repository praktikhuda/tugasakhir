<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSiteStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $statusFile = storage_path('app/site_status.json');

        // Default status jika file tidak ada
        if (!file_exists($statusFile)) {
            file_put_contents($statusFile, json_encode(['status' => 'on']));
        }

        $status = json_decode(file_get_contents($statusFile), true)['status'];

        // Mengecualikan rute 'keamanan'
        if ($status === 'on' && !$request->is('keamanan*')) {
            return response()->view('not_found', [], 403);
        }

        return $next($request);
    }
}
