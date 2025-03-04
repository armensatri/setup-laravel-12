<?php

namespace App\Models\Manageuser;

use App\Helpers\Searching;
use App\Models\Manageuser\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model implements Authenticatable
{
  protected $table = 'users';

  protected $fillable = [
    'name',
    'username',
    'email',
    'password',
    'image',
    'role_id',
    'is_active'
  ];

  public function getRouteKeyName()
  {
    return 'username';
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function active(): array
  {
    return $this->is_active
      ? ['bg' => 'green-200', 'text' => 'green-800', 'active' => 'active']
      : ['bg' => 'red-200', 'text' => 'red-800', 'active' => '!active'];
  }

  public function hasPermission($permission)
  {
    return $this->role?->permissions->contains('name', $permission);
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name'];

    $relations = [
      'role' => 'name'
    ];

    $query->when(
      $filters['search'] ?? false,
      function ($query, $search) use ($fields, $relations) {
        Searching::applySearch($query, $search, $fields, $relations);
      }
    );
  }
}
