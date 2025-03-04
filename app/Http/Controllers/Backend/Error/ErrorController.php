<?php

namespace App\Http\Controllers\Backend\Error;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
  public function blocked()
  {
    return view('backend.error.blocked', [
      'title' => 'Access blocked'
    ]);
  }
}
