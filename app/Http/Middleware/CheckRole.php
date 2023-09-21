<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            // Если пользователь не имеет требуемой роли, перенаправляем его на страницу ошибки или куда-либо ещё.
            return redirect('/'); // Пример перенаправления на главную страницу.
        }
    
        return $next($request);
    }
}
