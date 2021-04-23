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


class ReservaController extends Controller
{
    public function test()
    {
    	//Futbol5::create(['fecha' => '2021-04-18', 'hora' => '13-14', 'pagado' => 0]);
    	//Futbol7::create(['fecha' => '2021-04-11', 'hora' => '13-14', 'pagado' => 0]);
    	Futbolrap::create(['fecha' => '2021-04-18', 'hora' => '3', 'pagado' => 1]);
    	return "hola";
    }

    public function crearReserva5(Request $request)
    {  
        $reservas = Futbol5::where('fecha', $request->dia)->where('hora',$request->hora)->get();

        if( count($reservas) == 0 )
        {
            if( strtotime($request->dia) >= strtotime(date("Y-m-d")))
            {
                if ( $request->pagar == "Pagar en persona")
                {
                    Futbol5::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 0]);
                    $status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora.' recuerda que tendras que pagar en el lugar';
                    return redirect()->route('futbol5')->with('status',$status);
                }
                else
                {
                    Futbol5::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 1]);
                    $status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora;
                    return redirect()->route('paypalpay');
                    //return redirect()->route('futbol5')->with('status',$status);
                }
            }
            else
            {
                $status = 'Lo sentimos! No se puede reservar dado que es una fecha pasada.';
                return redirect()->route('futbol5')->with('failed',$status);
            }
        }
        else
        {
            
            $reservas = Futbol5::where('fecha', $request->dia)->get();
            //$horareservas = array();
            $status = 'Lo sentimos! No se puede reservar dado que ya hay una reserva. Los horarios ya reservados para el dia '.$request->dia.' son: ';

            foreach($reservas as $i => $i_value) {
                //array_push($horareservas, $i_value->hora);
                $status = $status.$i_value->hora.', ';
            }
            //return $status;
            return redirect()->route('futbol5')->with('failed',$status);
        }
    }
    public function crearReserva7(Request $request)
    {  
        $reservas = Futbol7::where('fecha', $request->dia)->where('hora',$request->hora)->get();

        if( count($reservas) == 0 )
        {
            if( strtotime($request->dia) >= strtotime(date("Y-m-d")))
            {
                if ( $request->pagar == "Pagar en persona")
                {
                    Futbol7::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 0]);
                    $status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora.' recuerda que tendras que pagar en el lugar';
                    return redirect()->route('futbol7')->with('status',$status);
                }
                else
                {
                    Futbol7::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 1]);
                    $status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora;
                    return redirect()->route('paypalpay');
                    //return redirect()->route('futbol7')->with('status',$status);
                }
            }
            else
            {
                $status = 'Lo sentimos! No se puede reservar dado que es una fecha pasada.';
                return redirect()->route('futbol7')->with('failed',$status);
            }
        }
        else
        {
            
            $reservas = Futbol7::where('fecha', $request->dia)->get();
            //$horareservas = array();
            $status = 'Lo sentimos! No se puede reservar dado que ya hay una reserva. Los horarios ya reservados para el dia '.$request->dia.' son: ';

            foreach($reservas as $i => $i_value) {
                //array_push($horareservas, $i_value->hora);
                $status = $status.$i_value->hora.', ';
            }
            //return $status;
            return redirect()->route('futbol7')->with('failed',$status);
        }
    }
    public function crearReservarap(Request $request)
    {  

        $reservas = Futbolrap::where('fecha', $request->dia)->where('hora',$request->hora)->get();

        if( count($reservas) == 0 )
        {
	        if( strtotime($request->dia) >= strtotime(date("Y-m-d")))
	        {
	        	if ( $request->pagar == "Pagar en persona")
		        {
		        	Futbolrap::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 0]);
		        	$status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora.' recuerda que tendras que pagar en el lugar';
                    return redirect()->route('futbolrapido')->with('status',$status);
		        }
		        else
		        {
		        	Futbolrap::create(['user_id' => Auth::user()->id, 'fecha' => $request->dia, 'hora' => $request->hora, 'pagado' => 1]);
		        	$status = 'Has realizado la reserva para el dia '.$request->dia.' y la hora '.$request->hora;
                    return redirect()->route('paypalpay');
                    //return redirect()->route('futbolrapido')->with('status',$status);
		        }
	        }
	        else
	        {
                $status = 'Lo sentimos! No se puede reservar dado que es una fecha pasada.';
	        	return redirect()->route('futbolrapido')->with('failed',$status);
	        }
	    }
	    else
	    {
            
            $reservas = Futbolrap::where('fecha', $request->dia)->get();
            //$horareservas = array();
            $status = 'Lo sentimos! No se puede reservar dado que ya hay una reserva. Los horarios ya reservados para el dia '.$request->dia.' son: ';

            foreach($reservas as $i => $i_value) {
                //array_push($horareservas, $i_value->hora);
                $status = $status.$i_value->hora.', ';
            }
	    	//return $status;
            return redirect()->route('futbolrapido')->with('failed',$status);
	    }
    }

}
