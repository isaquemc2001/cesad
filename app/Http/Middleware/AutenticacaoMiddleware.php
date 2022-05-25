<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class AutenticacaoMiddleware
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

        if(isset($_SESSION['cpf']) && $_SESSION['cpf'] != ''){
            return $next($request);
            session_destroy();
        }else{
            return redirect()->route("chamado.login");
        }
    }
}
