<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStudentRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( Auth()->user()->role === 'student') {
            return $next($request);
        }
       // return redirect()->to('/profile');
        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this resource.');
    }
}
