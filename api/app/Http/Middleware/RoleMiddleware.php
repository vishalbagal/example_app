<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware {
    public function handle($request, Closure $next, $role) {
       echo "Role: ".$role;
       return $next($request);
    }
 }
