<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vivienda;

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


//--------------- jquery -----------------

    public function validarCorreoRegistro(Request $request)
    {

        //valida que el usuario no tenga cuenta en la aplicacion, regresa un numero
        $usr = User::select()->where('email', $request->id)->count();
        //si la validacion es mayor a 1 significa que ya hay una cuenta con ese dato

        if ($usr != 0 ) {
            return response()->json(2); //el usuario ya tiene cuenta
        } else {
            //Si no esta en la lista regresa el numero 2 que tendra un valor en el jquery
            $viv = Vivienda::select()->where('correo','=',$request->id)->count();

            if ($viv == 0) {
                return response()->json(3); //no tienen apartamento relacionada
            } else {
                
            }
            
        }



    }





}
