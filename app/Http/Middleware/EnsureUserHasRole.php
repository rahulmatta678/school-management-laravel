<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensures the authenticated user has the required role.
 *
 * Register in bootstrap/app.php under withMiddleware() as:
 *   $middleware->alias(['role' => EnsureUserHasRole::class])
 *
 * Usage in routes:
 *   Route::middleware(['auth', 'role:admin'])...
 *   Route::middleware(['auth', 'role:teacher'])...
 */
class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  string   $role  The required role value (e.g. 'admin', 'teacher')
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Convert the string parameter to the typed enum for comparison
        $requiredRole = UserRole::from($role);

        if (! $request->user() || $request->user()->role !== $requiredRole) {
            abort(403, 'Unauthorized. You do not have permission to access this area.');
        }

        return $next($request);
    }
}
