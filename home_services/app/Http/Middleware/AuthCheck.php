<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has('LoggedUser') && $request->path() != '/')
        {
            return redirect('/')->with('fail','Login to Proceed');
        }

        if(session()->has('LoggedUser') && $request->path() == '/')
        {
            if(session('LoggedUserType') == '')
            {
                return back();
            }
            else
            {
                if(session('LoggedUserType') == 1)
                {
                    //return redirect('dashboard');
                    return redirect('welcome');
                }
                else
                {
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
