<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfile
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
      session_start();
      $perfil = $_SESSION['usuario_sesion'][0]->perfil_id;
      if($perfil == 1)
      {
        return $next($request);
      }
      else {
        return redirect('/');
      }


    }
}
