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
        $query = DB::table('vw_listaviviendas')->get();
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




}
