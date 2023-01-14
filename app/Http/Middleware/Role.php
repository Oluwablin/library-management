<?php

namespace App\Http\Middleware;

use App\Oluwablin\OluwablinApp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    use OluwablinApp;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return $this->AppResponse('error', 'Unauthorized access', 403);
        }

        $user = Auth::user();

        foreach ((array) $roles as $role) {
            // if the user has this role, let them pass through
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // user is not one of the matching 'roles'
        return $this->AppResponse('error', 'Unauthorized access for role: '. $role, 403);
    }
}
