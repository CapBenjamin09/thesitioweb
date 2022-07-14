<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credenciales = $request->only('mail','password');
        //$mail = $request->only('mail');
        //$password = $request->only(''.'password');
        if(auth()->attempt($credenciales) == false)
        {
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos. Intenta de nuevo.'
            ]);
            
        } else{
            if(auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.index');
            } 
            else if (auth()->user()->role == 'guest')
            {
                return redirect()->route('user.index');
            }
            else if (auth()->user()->role == 'operator')
            {
                return redirect()->route('operator.index');
            }
        }
        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
