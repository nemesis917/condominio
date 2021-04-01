<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vivienda;
use App\Models\Empresa;
use App\Models\Edificio;
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
        $vivienda = Vivienda::find($request->idMax);
        $edificio = Edificio::find( $request-> cargarEdificioMod );

        $empresa_id = $request->idEmp;
        $edificio_id = $request->idEdf;

        $vivienda->correo = $request->cargarCorreoMod;
        $vivienda->num_inmueble = $request->cargarNumeroInmuebleMod;
        $vivienda->nombre = $request->cargarNombrePropietarioMod;
        $vivienda->apellido = $request->cargarApellidoPropietarioMod;
        $vivienda->estado_inmueble = $request->cargarEstadoInmuebleMod;
        $vivienda->alicuota = $request->cargarAlicuotaMod;
        $vivienda->gastos_administracion = $request->cargarGastosMod;
        $vivienda->telefono_oficina = $request->cargarTlfMovilMod;
        $vivienda->telefono_habitacion = $request->cargarTlfLocalMod;
        $vivienda->edificio_id = $request-> cargarEdificioMod;

        $vivienda->updated_at = now();
        $res = $vivienda->update();

        if ($res) {
            $id_empresa = $request->empresaMod;

            $edificio->empresa()->updateExistingPivot($request->cargarEdificioMod, ['empresa_id' => $id_empresa ]);

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

        $viv = new Vivienda;

        $viv->correo = $request->cargarCorreo;
        $viv->num_inmueble = $request->cargarNumeroInmueble;
        $viv->nombre = $request->cargarNombrePropietario;
        $viv->apellido = $request->cargarApellidoPropietario;
        $viv->estado_inmueble = $request->cargarEstadoInmueble;
        $viv->alicuota  = $request->cargarAlicuota;
        $viv->gastos_administracion = $request->cargarGastos;
        $viv->telefono_oficina = $request->cargarTlfMovil;
        $viv->telefono_habitacion = $request->cargarTlfHabitacion;
        $viv->edificio_id = $request->cargarEdificio;

        $save = $viv->save();
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





}
