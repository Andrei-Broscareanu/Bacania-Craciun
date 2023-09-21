<?php

namespace App\Http\Middleware;

use App\Helpers\Cart;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $total = Cart::getCartTotal();
        if($total <= 0){
            return redirect('/cart')->with('warning','Pagina de checkout nu se poate accesa daca cosul nu are produse.');
        }
        return $next($request);
    }
}
