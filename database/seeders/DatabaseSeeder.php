<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Managemenu\{
  MenuSeeder,
  SubmenuSeeder,
};

use Database\Seeders\Manageuser\{
  UserSeeder,
  RoleSeeder,
  PermissionSeeder,
};

use Database\Seeders\pivot\{
  RolehasmenuSeeder,
  RolehaspermissionSeeder,
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
      RolehasmenuSeeder::class,
      PermissionSeeder::class,
      RolehaspermissionSeeder::class,
    ]);
  }
}
