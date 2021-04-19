<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        return view('test');
    }

    public function futbol5()
    {
        return view('futbol5');
    }

    public function futbol7()
    {
        return view('futbol7');
    }

    public function futbolrapido()
    {
        return view('futbolrapido');
    }

    public function landing()
    {
        return view('landing');
    }

}
