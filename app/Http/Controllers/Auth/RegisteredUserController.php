<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vivienda;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $usr = User::select()->where('email', $request->email)->count();

        if ($usr == 0) {
            $viv = Vivienda::select()->where('correo', $request->email)->count();
        }
        if ($viv >= 1) {

            $request->validate([
                'name' => 'required|string|max:100',
                'lastname' => 'required|string|max:100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ]);
    


            $correo = Vivienda::select('id')->where('correo', $request->email)->get();

            if ($correo) {

                Auth::login($user = User::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]));

                foreach ($correo as $mail) {
                    $user->apartamentos()->attach($mail->id);
                }
                
                event(new Registered($user));
        
                return redirect(RouteServiceProvider::HOME);
            }

        } else {
            dd("aqui esta el error");
        }


    }
}
