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
                ->addColumn('btn', 'system.empresa.btn.btnConsultar')
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

    public function jq_porc_alicuota($id)
    {
        $cantidadAparatamento = Edificio::select('cant_apart')->get();
        $suma = Vivienda::select('alicuota')->where('edificio_id', $id)->sum('alicuota');
        
        return response()->json([$cantidadAparatamento, $suma]);
    }

}
