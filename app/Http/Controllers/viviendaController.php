<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vivienda;
use App\Models\Empresa;
use App\Models\Edificio;
use App\Models\User;
use DataTables;

class viviendaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::select('id', 'empresa')->get();
        return view('system.vivienda.consulta')->with('empresa', $empresa);
    }

    public function consultarVivienda()
    {
        //$query = Vivienda::select('id','num_inmueble', 'concat('. ' ' .', nombre, apellido)')->orderBy('id', 'desc')->get();
        $query = DB::table('vw_listaviviendas')->where('id', "h")->get();
        return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('btn', 'system.empresa.btn.btnConsultar')
                ->rawColumns(['btn'])
                ->make(true);
    }

    public function actualizarVivienda(Request $request)
    {

        $request->validate([
            'cargarCorreoMod' => 'required|max:60',
            'cargarNumeroInmuebleMod' => 'required|max:10',
            'cargarNombrePropietarioMod' => 'required|max:30',
            'cargarApellidoPropietarioMod' => 'required|max:30',
            'cargarEstadoInmuebleMod' => 'required|max:3',
            'cargarAlicuotaMod' => 'required|max:14',
            'cargarGastosMod' => 'required|max:13|between:0,9999999999.99',
            'cargarTlfMovilMod' => 'required|max:12',
            'cargarTlfLocalMod' => 'required|max:12',
            'cargarEdificioMod' => 'required|max:11'
            
        ]);

        $vivienda = Vivienda::find($request->idMax);
        $edificio = Edificio::find( $request-> cargarEdificioMod );
        $correoViejo = $vivienda->correo;
        $oldUser =  User::select()->where('email', $correoViejo)->get();
        $user = User::select()->where('email', $request->cargarCorreoMod)->get();
        $oldUserCount = sizeof($oldUser);
        $userCount = sizeof($user);
        $empresa_id = $request->idEmp;
        $edificio_id = $request->idEdf;

        $vivienda->correo = $request->cargarCorreoMod;
        $vivienda->num_inmueble = strtoupper($request->cargarNumeroInmuebleMod);
        $vivienda->nombre = ucfirst($request->cargarNombrePropietarioMod);
        $vivienda->apellido = ucfirst($request->cargarApellidoPropietarioMod);
        $vivienda->estado_inmueble = $request->cargarEstadoInmuebleMod;
        $vivienda->alicuota = $request->cargarAlicuotaMod;
        $vivienda->gastos_administracion = $request->cargarGastosMod;
        $vivienda->telefono_oficina = $request->cargarTlfMovilMod;
        $vivienda->telefono_habitacion = $request->cargarTlfLocalMod;
        $vivienda->edificio_id = $request-> cargarEdificioMod;

        $vivienda->updated_at = now();
        $res = $vivienda->update();

        if ($oldUserCount == 0 AND $userCount == 0) {
            # No hagas nada supongo
        } elseif ($oldUserCount == 0 AND $userCount == 1) {
            $vivienda->usuario()->attach($user[0]->id);
        } elseif($oldUserCount == 1 AND $userCount == 1) {
            $vivienda->usuario()->updateExistingPivot($oldUser[0]->id, ['user_id' => $user[0]->id ]);
        } elseif($oldUserCount == 1 AND $userCount == 0) {
            $vivienda->usuario()->detach($oldUser[0]->id);
        } else {
            dd("Estresate porque algo esta mal en tu logica");
        }


        if ($res) {
            $id_empresa = $request->empresaMod;

            $edificio->empresa()->updateExistingPivot($request->cargarEdificioMod, ['empresa_id' => $id_empresa ]);
            
            return redirect()->route('vivienda.index')->with('mensaje', "1");
        } else {
            return redirect()->route('vivienda.index')->with('mensaje', "2"); 
        }



    }


//  ---------- Jquery -------------

    public function jq_seleccionarEmpresa($id)
    {
        $query = Edificio::select(
            'edificio.id AS id',
            'edificio.nombre_edificio AS nombre_edificio',
            )
            ->join('edificio_empresa', 'edificio_empresa.edificio_id', '=', 'edificio.id')
            ->join('empresa', 'empresa.id', '=', 'edificio_empresa.empresa_id')
            ->where('empresa.id', $id)->get();

        return response()->json($query);
    }

    public function jq_consultarVivienda($id)
    {
        $query = Vivienda::select('id','num_inmueble', 'nombre', 'apellido')->orderBy('id', 'desc')->where('edificio_id', $id)->get();
        // $query = Edificio::select(
        //     'edificio.id AS id',
        //     'edificio.nombre_edificio AS nombre_edificio',
        //     )
        //     ->join('edificio_empresa', 'edificio_empresa.edificio_id', '=', 'edificio.id')
        //     ->join('empresa', 'empresa.id', '=', 'edificio_empresa.empresa_id')
        //     ->where('empresa.id', $id)->get();

        return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('btn', 'system.vivienda.btn.btnConsultar')
                ->rawColumns(['btn'])
                ->make(true);
    }

    public function jq_guardarViviendas(Request $request)
    {
        
        $request->validate([
            'cargarCorreo' => 'required|max:60',
            'cargarNumeroInmueble' => 'required|max:10',
            'cargarNombrePropietario' => 'required|max:30',
            'cargarApellidoPropietario' => 'required|max:30',
            'cargarEstadoInmueble' => 'required|max:3',
            'cargarAlicuota' => 'required|max:14',
            'cargarGastos' => 'required|max:13|between:0,9999999999.99',
            'cargarTlfMovil' => 'required|max:12',
            'cargarTlfHabitacion' => 'required|max:12',
            'cargarEdificio' => 'required|max:11'
            
        ]);

        $user = User::select()->where('email', $request->cargarCorreo)->get();

        $viv = new Vivienda;

        $viv->correo = strtolower($request->cargarCorreo);
        $viv->num_inmueble = strtoupper($request->cargarNumeroInmueble);
        $viv->nombre = ucfirst($request->cargarNombrePropietario);
        $viv->apellido = ucfirst($request->cargarApellidoPropietario);
        $viv->estado_inmueble = $request->cargarEstadoInmueble;
        $viv->alicuota  = $request->cargarAlicuota;
        $viv->gastos_administracion = $request->cargarGastos;
        $viv->telefono_oficina = $request->cargarTlfMovil;
        $viv->telefono_habitacion = $request->cargarTlfHabitacion;
        $viv->edificio_id = $request->cargarEdificio;

        $save = $viv->save();

        if(count($user) != 0){
            $viv->usuario()->attach($user[0]->id);
        }
        
        return response()->json($save);

    }

    public function jq_porc_alicuota($empresa,$edificio)
    {
        $suma = Vivienda::select('id','alicuota')->where('edificio_id', $empresa)->sum('alicuota');

        $cantidadAparatamento = Edificio::select('edificio.cant_apart AS cant_apart')
        ->join('edificio_empresa', 'edificio_empresa.edificio_id', 'edificio.id')
        ->where('edificio.id', $edificio)
        ->get();

        return response()->json([$cantidadAparatamento, $suma]);

    }

    public function jq_modificarVivienda($vivienda, $cargarEdificio)
    {

        $mod = Vivienda::select()->where('edificio_id', $cargarEdificio)->where('id', $vivienda)->first();
        return response()->json($mod);

    }

    public function jq_eliminarVivienda(Request $request)
    {
        $eliminar = Vivienda::find($request->id);
        $salvar = $eliminar->delete();

        return response()->json($salvar);

    }



}
