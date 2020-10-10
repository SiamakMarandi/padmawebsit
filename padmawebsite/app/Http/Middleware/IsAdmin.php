<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

        $user=Auth::user();

        if(!$user->isAdmin()){

            //return redirect()->intended('layout.admin');
            //return redirect('contact');
           // return view('padma.layout.admin');
            //return view('padma.layout.contact');
            return redirect('/');
        }



        return $next($request);




    }
}
