<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Backend\Error\ErrorController;
use App\Http\Controllers\Backend\Account\AccountController;

use App\Http\Controllers\Auth\{
  LoginController,
  LogoutController,
  RegisterController,
};

use App\Http\Controllers\Backend\Manageaccess\{
  MenuController,
  PermissionController,
};

use App\Http\Controllers\Backend\Dashboard\{
  OwnerController,
  SuperadminController,
  AdminController,
  MemberController,
};

use App\Http\Controllers\Backend\Manageuser\{
  RolesController,
  PermissionsController,
};

use App\Http\Controllers\Backend\Managemenu\{
  MenusController,
  SubmenusController,
};

/*---------------------------------------------------------------
// * ROUTE AUTH
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE LOGIN & REGISTER
|---------------------------------------------------------------*/

Route::group(['middleware' => ['guest']], function () {
  Route::controller(LoginController::class)->group(
    function () {
      Route::get('/auth/login', 'index')->name('login');
      Route::post('/auth/login', 'store')->name('login.store');
    }
  );

  Route::controller(RegisterController::class)->group(
    function () {
      Route::get('/auth/register', 'index')->name('register');
      Route::post('/auth/register', 'store')->name('register.store');
    }
  );
});

/*---------------------------------------------------------------
| ROUTE LOGOUT
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  Route::post('/auth/logout', [LogoutController::class, 'logout'])
    ->name('logout');
});

/*---------------------------------------------------------------
// * ROUTE FRONTEND
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE HOME
|---------------------------------------------------------------*/

Route::get('/', [HomeController::class, 'index'])
  ->name('home');

/*---------------------------------------------------------------
| ROUTE ?
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
// * ROUTE BACKEND
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE DASHBOARD
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  Route::get('/owner', [OwnerController::class, 'index'])
    ->name('owner');

  Route::get('/superadmin', [SuperadminController::class, 'index'])
    ->name('superadmin');

  Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin');

  Route::get('/member', [MemberController::class, 'index'])
    ->name('member');
});

/*---------------------------------------------------------------
| ROUTE DRAFT
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE SLUG
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  Route::get('/roles/slug', [RolesController::class, 'slug']);
  Route::get('/permissions/slug', [PermissionsController::class, 'slug']);
  Route::get('/menus/slug', [MenusController::class, 'slug']);
  Route::get('/submenus/slug', [SubmenusController::class, 'slug']);
});

/*---------------------------------------------------------------
| ROUTE ACCOUNT
|---------------------------------------------------------------*/

Route::group(['middleware' => ['auth']], function () {
  Route::controller(AccountController::class)->group(
    function () {
      //
    }
  );
});

/*---------------------------------------------------------------
| ROUTE ACCESS
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE MANAGE ACCESS
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE MANAGE DATA
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE MANAGE USER
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE MANAGE MENU
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE RANDOM
|---------------------------------------------------------------*/

Route::get('/blocked', [ErrorController::class, 'blocked'])
  ->name('blocked');
