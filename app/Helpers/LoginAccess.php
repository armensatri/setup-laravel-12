<?php

namespace App\Helpers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginAccess
{
  public static function Menu()
  {
    if (!Auth::check()) {
      return Redirect::route('login')->send();
    }

    $roleId = Auth::user()->role_id;
    $menuSegment = request()->segment(1);

    $queryMenu = Menu::select('name')
      ->where('name', $menuSegment)
      ->with('submenus')
      ->first();

    if (!$queryMenu) {
      return Redirect::route('blocked')->send();
    }

    $queryAccessMenu = DB::table('role_has_menu')
      ->where('role_id', $roleId)
      ->where('menu_id', $queryMenu)
      ->exists();

    if (!$queryAccessMenu) {
      return Redirect::route('blocked')->send();
    }
  }
}
