<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Menambahkan pengecualian CSRF untuk rute tertentu
        'StudentAdd',
        'api/*',  // Contoh: menonaktifkan CSRF untuk semua rute API
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Mengecek apakah URI ada dalam pengecualian
        if ($this->isReading($request) || $this->shouldPassThrough($request)) {
            return $next($request);
        }

        // Verifikasi CSRF token jika tidak dikecualikan
        if ($this->tokensMatch($request)) {
            return $next($request);
        }

        // Jika token tidak cocok, kirimkan respon 419
        return $this->tokensMismatchResponse();
    }

    /**
     * Determine if the request is a "read" request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isReading(Request $request)
    {
        return in_array($request->method(), ['HEAD', 'GET', 'OPTIONS']);
    }

    /**
     * Determine if the request should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldPassThrough(Request $request)
    {
        foreach ($this->except as $except) {
            if (Str::is($except, $request->path())) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the CSRF token in the request matches the one in the session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tokensMatch(Request $request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
        return is_string($token) && hash_equals($request->session()->token(), $token);
    }

    /**
     * Get the response for an invalid CSRF token.
     *
     * @return \Illuminate\Http\Response
     */
    protected function tokensMismatchResponse()
    {
        return response()->json(['message' => 'CSRF token mismatch'], 419);
    }
}
