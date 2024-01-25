<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\Models\Futbol5;
use App\Models\Futbol7;
use App\Models\Futbolrap;
use App\Models\User;
use App\Models\Promo;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Session;

use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        if (Session::has('fechaReservaPendiente')) {
            Futbol5::where('user_id', Auth::user()->id)->where('fecha', Session::get('fechaReservaPendiente'))->where('hora', Session::get('horaReservaPendiente'))->delete();

            if ( Session::get('canchaReservaPendiente') == 'futbol5' ) 
            {   
                Futbol5::where('user_id', Auth::user()->id)->where('fecha', Session::get('fechaReservaPendiente'))->where('hora', Session::get('horaReservaPendiente'))->delete();
            } 
            elseif ( Session::get('canchaReservaPendiente') == 'futbol7' ) 
            {
                Futbol7::where('user_id', Auth::user()->id)->where('fecha', Session::get('fechaReservaPendiente'))->where('hora', Session::get('horaReservaPendiente'))->delete();
            }
            elseif ( Session::get('canchaReservaPendiente') == 'futbolrap' ) 
            {
                Futbolrap::where('user_id', Auth::user()->id)->where('fecha', Session::get('fechaReservaPendiente'))->where('hora', Session::get('horaReservaPendiente'))->delete();
            }

            }
    }
}
