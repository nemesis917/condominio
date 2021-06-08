<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Gasto;
use App\Imports\gastosImport;
use DataTables;

class gastosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunes = Gasto::select()->where("estados", "gasto comun")->count();
        $noComunes = Gasto::select()->where("estados", "gasto no comun")->count();
        
        return view('gastos.index')->with(["comunes" => $comunes, "noComunes" => $noComunes]);
    }


    public function cargarUnDato(Request $request)
    {
        $cargar = new Gasto();
        $cargar->codigo_gastos = $request->codigo;
        $cargar->descripcion_gastos = $request->descripcion;
        $cargar->estados = $request->customRadio;

        if ($request->customRadio == "gasto1") {
            $cargar->estados = "gasto comun";
        } else {
            $cargar->estados = "gasto no comun";
        }
        
        $res = $cargar->save();

        if ($res) {
            return redirect()->route('conf.gastos.index')->with('mensaje', "1"); 
        } else {
            return redirect()->route('conf.gastos.index')->with('mensaje', "2"); 
        }
    
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// ------------------ Excel --------------------

public function subirExcel(Request $request)
{
    $file = $request->file('file');
    Excel::import(new gastosImport, $file);

    return back()->with('mensaje', 3);
}
// ----------------- Jquery ------------------

    public function jq_gastos()
    {
        $query = Gasto::select()->orderBy("id", "desc")->get();


        return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('btn', 'gastos.btn.btn')
                ->rawColumns(['btn'])
                ->make(true);
    }

}
