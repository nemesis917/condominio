<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use DataTables;

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

            $query = Empresa::select('id','empresa')->orderBy('id', 'desc')->get();
            return Datatables::of($query)
                    ->addIndexColumn()
                    ->addColumn('btn', 'system.empresa.btn.btnConsultar')
                    ->rawColumns(['btn'])
                    ->make(true);

            // $query = Empresa::select('empresa')->orderBy('id', 'desc')->get();
            // return Datatables::of($query)
            //         ->addIndexColumn()
            //         ->addColumn('btn', function($row){
            //             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
            //         return $btn;
            //         })
            //         ->rawColumns(['btn'])
            //         ->make(true);

        }

        public function jq_consult(Request $request)
        {
            $emp = Empresa::find($request->id);
            return response()->json($emp);
        }



}
