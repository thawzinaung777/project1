<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }
}
