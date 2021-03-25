<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Edificio;
use DataTables;
use UxWeb\SweetAlert\SweetAlert;

class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Empresa::select('empresa')->limit(5)->orderBy('id', 'desc')->get();
        $edif = Edificio::select('id','nombre_edificio')->limit(5)->orderBy('id', 'desc')->get();
        return view('system.edificio.index')->with('empresa', $data)->with('edificio', $edif);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultar()
    {
        // alert('Success Message', 'Optional Title');
        return view('system.empresa.consultar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|max:80'
        ]);
        
        $data = new Empresa;
        $data->empresa = $request->empresa;
        $data->users_id = \Auth::user()->id;
        $save = $data->save();

        if ($save) {
            return back()->with('mensaje', "1");
        } else {
            return back()->with('mensaje', '2');
        }

    }

    public function modify(Request $request)
    {
        $request->validate([
            'empresa' => 'required|max:80'
        ]);
        $emp = Empresa::find($request->data);
        $emp->empresa = $request->empresa;
        $emp->users_id = \Auth::user()->id;
        $emp->updated_at = now();
        $val = $emp->update();
        if ($val) {
            return back()->with('mensaje', "1");
        } else {
            dd("algo se daño");
        }
    }


    public function destroy(Request $request) 
    {
        $emp = Empresa::find($request->id);
        $del = $emp->delete();

        if ($del) {
            return response()->json(1);
        } else {
            return response()->json(2);
        }

    }

    // ---------------- jquery -------------------

        public function jq_consultarEmpresa()
        {

            $query = Empresa::select('id','empresa')->orderBy('id', 'desc')->get();
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('btn', 'system.empresa.btn.btnConsultar')
                    ->rawColumns(['btn'])
                    ->make(true);



        }

        public function jq_consult(Request $request)
        {
            $emp = Empresa::find($request->id);
            return response()->json($emp);
        }



}
