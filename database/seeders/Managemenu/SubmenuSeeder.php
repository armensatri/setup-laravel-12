<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Submenu;

class SubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $submenus = [
      [
        'menu_id' => 1,
        'ssm' => 1,
        'name' => 'owner',
        'slug' => 'owner',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => 'submenu dashboard owner'
      ],

      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'superadmin',
        'slug' => 'superadmin',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => '/superadmin',
        'description' => 'submenu dashboard super admin'
      ],

      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'admin',
        'slug' => 'admin',
        'route' => '/admin',
        'active' => 'admin',
        'routename' => '/admin',
        'description' => 'submenu dashboard admin'
      ],

      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'member',
        'slug' => 'member',
        'route' => '/member',
        'active' => 'member',
        'routename' => '/member',
        'description' => 'submenu dashboard member'
      ],

      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'profile',
        'slug' => 'profile',
        'route' => '/account/profile',
        'active' => 'account/profile',
        'routename' => '/account/profile',
        'description' => 'submenu user profile'
      ],
      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'edit profile',
        'slug' => 'edit-profile',
        'route' => '/account/edit/profile',
        'active' => 'account/edit/profile',
        'routename' => '/account/edit/profile',
        'description' => 'submenu user edit profile'
      ],
      [
        'menu_id' => 5,
        'ssm' => 3,
        'name' => 'change password',
        'slug' => 'change-password',
        'route' => '/account/change/password',
        'active' => 'account/change/password',
        'routename' => '/account/change/password',
        'description' => 'submenu user change password'
      ],

      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'menu',
        'slug' => 'menu',
        'route' => '/manageaccees/menu',
        'active' => 'manageaccess/menu',
        'routename' => '/manageaccess/menu',
        'description' => 'manage access menu'
      ],
      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'permission',
        'slug' => 'permission',
        'route' => '/manageaccess/permission',
        'active' => 'manageaccess/permission',
        'routename' => '/manageaccess/permission',
        'description' => 'manage access permission'
      ],

      [
        'menu_id' => 7,
        'ssm' => 1,
        'name' => 'data',
        'slug' => 'data',
        'route' => '/managedata/data',
        'active' => 'managedata/data',
        'routename' => '/managedata/data',
        'description' => 'manage data'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
