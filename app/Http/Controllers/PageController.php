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

    public function conocenos()
    {
        return view('conocenos');
    }

    public function mostrarPromociones()
    {
        $promos = Promo::where('activa', 1)->get();
        return view('promociones')->with('promos',$promos);
    }
    
    public function crearPromociones()
    {
        $promos = Promo::all();
        return view('crearpromocion')->with('promos',$promos);
    }

    public function postPromociones(Request $request)
    {
        Promo::create([ 'nombre'=>$request->nombrepromo, 'descripcion'=>$request->descpromo, 'activa'=>1 ]);
        return redirect()->route('crearpromociones');
    }

    public function cambiarEstadoPromo(Request $request)
    {
        if ($request->estadoPromo == 1) {
            Promo::where('id', $request->idPromo)->update(['activa' => 0]);
            return redirect()->route('crearpromociones');

        } elseif ($request->estadoPromo == 0) {
            Promo::where('id', $request->idPromo)->update(['activa' => 1]);
            return redirect()->route('crearpromociones');
        }
    }

    public function mostrarReservas()
    {
        return view('reservas');
    }

    public function buscarReservas(Request $request)
    {
        $reservas5 = Futbol5::where('fecha', $request->fechares)->join('users', 'users.id', '=', 'futbol5s.user_id')->get();
        $reservas7 = Futbol7::where('fecha', $request->fechares)->join('users', 'users.id', '=', 'futbol7s.user_id')->get();
        $reservasrap = Futbolrap::where('fecha', $request->fechares)->join('users', 'users.id', '=', 'futbolraps.user_id')->get();
        return view('reservas')->with('futbol5',$reservas5)->with('futbol7',$reservas7)->with('futbolrap',$reservasrap);

    }

    public function limpiarDB()
    {
        return view('limpiardb');
    }

    public function limpiarDBfecha(Request $request)
    {
        //$borrar5 = Futbol5::where( 'fecha' ,'<=', $request->fechaborrar)->get();
        //$borrar7 = Futbol7::where( 'fecha' ,'<=', $request->fechaborrar)->get();
        //$borrarRap = Futbolrap::where( 'fecha' ,'<=', $request->fechaborrar)->get();

        $status = 'Has limpiado todos los datos desde '.$request->fechaborrar.'!';
        return redirect()->route('limpiarDB')->with('status',$status);
    }


}
