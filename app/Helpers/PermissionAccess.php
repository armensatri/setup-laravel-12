<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class PermissionAccess
{
  public static function CheckAccessPermission($roleId, $permissionId)
  {
    return DB::table('role_has_permission')
      ->where('role_id', $roleId)
      ->where('permission_id', $permissionId)
      ->exists() ? 'checked' : '';
  }
}
