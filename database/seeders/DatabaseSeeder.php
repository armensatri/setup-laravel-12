<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Manageuser\{
  UserSeeder,
  RoleSeeder,
  PermissionSeeder,
};

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder,
};

use Database\Seeders\Pivot\{
  RoleHasMenuSeeder,
  RoleHasPermissionSeeder,
};

class DatabaseSeeder extends Seeder
{
  public function run(): void
  {
    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      MenuSeeder::class,
      SubmenuSeeder::class,
      RoleHasMenuSeeder::class,
      PermissionSeeder::class,
      RoleHasPermissionSeeder::class,
    ]);
  }
}
