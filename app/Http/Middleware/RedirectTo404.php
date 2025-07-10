<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectTo404
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Lakukan pengecekan route dan redirect jika tidak terdaftar
        if (!$this->isValidRoute($request)) {
            return response()->view('errors.404', [], 404);
        }

        return $next($request);
    }

    protected function isValidRoute($request)
    {
        return $request->route() !== null;
    }
}
