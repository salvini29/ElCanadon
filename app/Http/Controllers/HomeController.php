<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\Models\Futbol5;
use App\Models\Futbol7;
use App\Models\Futbolrap;
use App\Models\User;
use App\Models\Promo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $reservas5 = Futbol5::where('user_id', Auth::user()->id)->get();
        $reservas7 = Futbol7::where('user_id', Auth::user()->id)->get();
        $reservasrap = Futbolrap::where('user_id', Auth::user()->id)->get();

        return view('home')->with('futbol5',$reservas5)->with('futbol7',$reservas7)->with('futbolrap',$reservasrap);
    }
}
