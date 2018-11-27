<?php

namespace App\Http\Middleware;

use Closure;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(is_null($request->route('admin'))){
            //return redirect('peras');
            return redirect()->action('FrutasController@peras')->withInput();
        }
        return $next($request);
    }
}
