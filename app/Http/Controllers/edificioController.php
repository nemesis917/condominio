<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edificio;
use App\Models\Empresa;
use DataTables;

class edificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Empresa::select('id', 'empresa')->limit(5)->get();
        $edif = Edificio::select()->limit(5)->get();

        return view('system.edificio.consultarEdificio')->with('empresa', $emp)->with('edificio', $edif);
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
            'codigoE' => 'required|max:3',
            'nombreE' => 'required|max:100',
            'codigoG' => 'required|max:3',
            'honorarios' => 'required|max:13|between:0,9999999999.99',
            'ubicacion' => 'required|max:30',
            'cantidadApartamentos' => 'required|max:3',
            'direccion' => 'required|max:200',
            'postal' => 'required|max:4',
            'reserva' => 'required|max:6|between:0,100.00',
            'morosos' => 'required|max:6|between:0,100.00',
            'iva' => 'required|max:6|between:0,100.00',
            'cheque' => 'required|max:6|between:0,100.00',
            'comentario' => 'max:200'            
        ]);

        $edif = new Edificio;
        $edif->codigo_edificio = $request->codigoE;
        $edif->nombre_edificio = $request->nombreE;
        $edif->codigo_gerente = $request->codigoG;

        $honor = str_replace(',', '', $request->honorarios); 

        $edif->honorarios_edif = $honor;
        $edif->ubicacion = $request->ubicacion;
        $edif->cant_apart = $request->cantidadApartamentos;
        $edif->direccion = $request->direccion;
        $edif->codigo_postal = $request->postal;
        $edif->porc_fondo_reserva = $request->reserva;
        $edif->porc_intereces_mor = $request->morosos;
        $edif->iva = $request->iva;
        $edif->porc_comision_cheque_devuelto = $request->cheque;
        $edif->comentario = $request->comentario;
        
        $guardadoParcial = $edif->save();

        if ($guardadoParcial) {
            $e = $edif->empresa()->sync($request->empresa);
            if ($e) {
                return redirect()->route('edificio.index')->with('mensaje', 1);
            } else {
                return redirect()->route('edificio.index')->with('mensaje', 2);
            }
        } else {
            return redirect()->route('edificio.index')->with('mensaje', 2);
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
    public function update(Request $request)
    {

        $request->validate([
            'codigoE' => 'required|max:3',
            'nombreE' => 'required|max:100',
            'codigoG' => 'required|max:3',
            'honorarios' => 'required|max:13|between:0,9999999999.99',
            'ubicacion' => 'required|max:30',
            'cantidadApartamentos' => 'required|max:3',
            'direccion' => 'required|max:200',
            'postal' => 'required|max:4',
            'reserva' => 'required|max:6|between:0,100',
            'morosos' => 'required|max:6|between:0,100.00',
            'iva' => 'required|max:6|between:0,100.00',
            'cheque' => 'required|max:6|between:0,100.00',
            'comentario' => 'required|max:200'            
        ]);
        
        $edif = Edificio::find($request->data);

        $edif->codigo_edificio = $request->codigoE;
        $edif->nombre_edificio = $request->nombreE;
        $edif->codigo_gerente = $request->codigoG;
        $edif->honorarios_edif = $request->honorarios;
        $edif->ubicacion = $request->ubicacion;
        $edif->cant_apart = $request->cantidadApartamentos;
        $edif->direccion = $request->direccion;
        $edif->codigo_postal = $request->postal;
        $edif->porc_fondo_reserva = $request->reserva;
        $edif->porc_intereces_mor = $request->morosos;
        $edif->iva = $request->iva;
        $edif->porc_comision_cheque_devuelto = $request->cheque;
        $edif->comentario = $request->comentario;
        $edif->updated_at = now();
        $res = $edif->update();

        $id_empresa = $edif->empresa[0]['id'];
        $edif->empresa()->updateExistingPivot($id_empresa, 
        ['empresa_id' => $request->modificarEmpresa]);

        if ($res) {
            return redirect()->route('edificio.index')->with('mensaje', 1);
        } else {
            return redirect()->route('edificio.index')->with('mensaje', 2);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $edif = Edificio::find($request->id);
        $id_empresa = $edif->empresa[0]['id'];
        $edif->empresa()->detach($id_empresa);


        $res = $edif->delete();
        if ($res) {
            return response()->json(1);
        } else {
            return response()->json(2);
        }

    }

//---------------- jquery ------------------

    public function jq_consulta()
    {
        $query = Edificio::select('id', 'nombre_edificio')->orderBy('id', 'desc')->get();
        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('btn', 'system.edificio.btn.btnConsultar')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function jq_modificarUnaEmpresa(Request $request)
    {
        $edif = Edificio::find($request->id);
        $emp = $edif->empresa[0];
        $empresa = Empresa::select('empresa', 'id')->get();
        return response()->json([$edif, $emp, $empresa]);

    }





}
