<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

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
        return view('system.empresa.index')->with('empresa', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultar()
    {
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

    // ---------------- jquery -------------------

        public function jq_consultarEmpresa()
        {
            $query = Empresa::select('empresa')->orderBy('id', 'desc')->get();

            return datatables()->of($query)->make(true)
            ->addColumn('btn','')
            ->rawColumns(['btn'])->toJson();
        }

}
