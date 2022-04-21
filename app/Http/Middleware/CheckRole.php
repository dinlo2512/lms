<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $teacher = Auth::guard('teacher')->user();
        if ($teacher->role_id == 2)
        {
            return redirect(route('teacher.admin.index'));
        }
        return $next($request);

    }
}
