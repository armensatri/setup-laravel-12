<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    $user = Auth::user();

    if (!$user) return Redirect::route('no-user')->send();
    if (!$user->role) return Redirect::route('no-role')->send();

    $role = $user->role;
    $permissions = $role->permissions;

    if ($permissions->isEmpty()) {
      return Redirect::route('no-permission')->send();
    }

    if (!$permissions->contains('name', $request->route()->getName())) {
      return Redirect::route('blocked')->send();
    }

    return $next($request);
  }
}
