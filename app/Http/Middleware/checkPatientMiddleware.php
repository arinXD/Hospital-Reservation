<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkPatientMiddleware
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
        $active_type = ['user','patient'];
        $user=auth()->user();
        $usertype=$user->usertype;
        if(in_array($usertype,$active_type)){
            return $next($request);
        }else if($usertype=="admin"){
            return redirect('/admin');
        }else{
            return redirect('/doctor');
            // return view('doctor_view/dashboard_doctor');
        }
    }
}
