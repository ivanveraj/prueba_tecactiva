<?php

namespace App\Http\Middleware;

use App\Models\Peticion;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Validacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $peticion=new Peticion;
        $peticion->fecha=Carbon::now();
        $peticion->save();
        if (Auth::check()) {
            return $next($request);
        }
        abort(404);
    }
}
