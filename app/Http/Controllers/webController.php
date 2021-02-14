<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function index()
    {
        return view('web/index');
    }

    public function nosotros()
    {
        return view('web/about');
    }

    public function servicios()
    {
        return view('web/services');
    }



}
