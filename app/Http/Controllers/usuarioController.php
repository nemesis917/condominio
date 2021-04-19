<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vivienda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DataTables;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system.config.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $usr = User::select()->where('email', $request->email)->count();

        if ($usr == 0) {
            $viv = Vivienda::select()->where('correo', $request->email)->count();
        }
        if ($viv >= 1) {

            $request->validate([
                'name' => 'required|max:100',
                'lastname' => 'required|max:100',
                'email' => 'required|max:100',
                'password' => 'required|max:100',     
            ]);

            $user = new User();

            $correo = Vivienda::select('id')->where('correo', $request->email)->get();

            if ($correo) {

                // Auth::login($user = User::create([
                //     'name' => $request->name,
                //     'lastname' => $request->lastname,
                //     'email' => $request->email,
                //     'password' => Hash::make($request->password),
                // ]));

                $user->name = ucfirst($request->name);
                $user->lastname = ucfirst($request->lastname);
                $user->email = strtolower($request->email);
                $user->password = Hash::make($request->password);
                $user->email_verified_at = now();
                $user->remember_token = $request->_token;
                $user->nivel_acceso = $request->level;
                $user->created_at = now();
                $user->updated_at = now();
    
                $res = $validar = $user->save();


                foreach ($correo as $mail) {
                    $user->apartamentos()->attach($mail->id);
                }
                
                // event(new Registered($user));
                //return redirect(RouteServiceProvider::HOME);

                if ($res) {
                    return back()->with('mensaje', "1");
                } else {
                    return back()->with('mensaje', '2');
                }
            }




            
        } else {
            dd("El correo no esta en la lista, por ende detengo el proceso");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datosUsuario($id)
    {
        $user = User::select(
            'users.id AS id',
            'users.name AS name',
            'users.lastname AS lastname',
            'users.email AS email',
            'users.nivel_acceso AS nivel_acceso',
            'apartamento.nombre AS nombre',
            'apartamento.apellido AS apellido',
            'apartamento.id AS id_apart',
            'apartamento.num_inmueble AS num_inmueble',
            'apartamento.nombre AS nombre_dueno',
            'apartamento.apellido AS apellido_dueno',
            'apartamento.alicuota AS alicuota',
            'apartamento.telefono_habitacion AS tlf_habitacion',
            'apartamento.telefono_oficina AS tlf_oficina',
            'apartamento.edificio_id AS edificio_id',
            'edificio.id AS id_edificio',
            'empresa.empresa AS empresa',
            'edificio.nombre_edificio',
            'edificio.direccion AS direccion')
            ->leftJoin('user_vivienda', 'users.id', '=', 'user_vivienda.user_id')
            ->leftJoin('apartamento', 'apartamento.id', '=', 'user_vivienda.vivienda_id')
            ->leftJoin('edificio', 'edificio.id', '=', 'apartamento.edificio_id')
            ->leftJoin('edificio_empresa', 'edificio_empresa.edificio_id', '=', 'edificio.id')
            ->leftJoin('empresa', 'empresa.id', '=', 'edificio_empresa.empresa_id')
            ->where('users.id', $id)
            ->get();

        return view('system.config.usuarios.consultar')->with('user', $user);
    }


    public function buscarDesactivados()
    {
        return view('system.config.usuarios.desactivados');
    }


    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',     
        ]);


        $user = User::find($request->data);
        $oldEmail = $user->email;

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel_acceso = $request->level;
        $res = $user->update();

        if ($res) {
        // En caso de querer a todos los relacionados con el correo

            if ($oldEmail != $request->email) {
                if ($request->check == "on") {
                    $cambio = Vivienda::select()->where("correo", $oldEmail)->get();
    
                    foreach ($cambio as $key) {
                        
                        $key->correo = $request->email;
                        $key->update();
            
                    }
                }
            }
        }


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

//--------------------------------------------

    public function jq_usuario()
    {
        $query = User::select(
            'id',
            'name',
            'lastname',
            'email',
            'nivel_acceso'
            )->where('estado', "activo")->get();
        
        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('btn', 'system.config.usuarios.btn.btnConsultar')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function jq_modUsuario(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);

    }

    public function jq_desactivarUsuario(Request $request)
    {
        $user = User::find($request->id);
        $user->estado = "inactivo";

        $res = $user->update();

        if ($res) {
            return response()->json($res);
        }
        
    }

    public function jq_usuarioDesactivado()
    {
        $query = User::select(
            'id',
            'name',
            'lastname',
            'email',
            'nivel_acceso'
            )->where('estado', "inactivo")->get();
        
        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('btn', 'system.config.usuarios.btn.btnDesactivar')
        ->rawColumns(['btn'])
        ->make(true);
    }

    public function jq_eliminandoUsuario(Request $request)
    {
        $user = User::find($request->id);

        $val = DB::table('user_vivienda')->where('user_id',$request->id)->get();
        if($val)
        {
            foreach ($val as $key) {
                DB::table('user_vivienda')->where('user_id',$key->id)->delete();
            }
        }

        $res = $user->delete();

        return response()->json(1);


    }




}
