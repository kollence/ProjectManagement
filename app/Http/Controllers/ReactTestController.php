<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReactTestController extends Controller
{
    public function index()
    {
      return view('react.index');
    }
}
