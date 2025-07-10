<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function accessDenied()
    {
        return view('pages.error.not-have-access-403');
    }
}
