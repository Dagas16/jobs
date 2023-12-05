<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Controllers\Middleware;

class IsRecruiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = Auth::id();
        //sjekker om bruker er logget inn og hører til en bedrift
        if ($id == null || User::find($id)->isRecruiter()) {
            return redirect('/');
        };
        return $next($request);
    }
}
