<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Every logged-in user in this application is an admin — there is no
     * public registration and no customer-facing accounts, so a single
     * "users" table with a plain auth check is enough for one client.
     * If staff roles are ever needed, extend this to check a role/column.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
