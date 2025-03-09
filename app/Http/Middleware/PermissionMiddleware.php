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

    if (!$user?->role) {
      return Redirect::route('blocked')->send();
    }

    if (!$user->role->permissions()->exists()) {
      return Redirect::route('blocked')->send();
    }

    if (!$user->role->permissions()
      ->where(
        'name',
        $request->route()->getName()
      )->exists()) {
      return Redirect::route('blocked')->send();
    }

    return $next($request);
  }
}
