<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailclass;
use App\Mail\MailSolicitud;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(10)->where('estado','activo');
        return view('admin.index')
        ->with('users', $users);
    }

    public function createUserview()
    {
        return view('admin.createUser');
    }

    public function createUser(Request $request)
    {
        $DesdeLetra = "a";
        $HastaLetra = "z";
        $DesdeNumero = 1;
        $HastaNumero = 1000;

        $letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
        $numeroAleatorio = rand($DesdeNumero, $HastaNumero);
        $letraAleatoria2 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
        $numeroAleatorio2 = rand($DesdeNumero, $HastaNumero);

        $password = $letraAleatoria.$letraAleatoria2.$numeroAleatorio.$numeroAleatorio2;
        
        $request->validate([
                    'primerNombre' => 'required',
                    'primerApellido' => 'required',                     
                    'dpi' => ['digits:13','unique:users'],
                    'foto' => 'required|mimes:jpg,png,jpeg',
                    'mail' => ['required','email','unique:users']
                ]);
            $mail = $_POST['mail'];
        
        if(request('role') == 'guest')
        {
            $user = User::create([
                'primerNombre' => request('primerNombre'),
                'segundoNombre' => request('segundoNombre'),
                'primerApellido' => request('primerApellido'),
                'segundoApellido' => request('segundoApellido'),
                'apellidoCasada' => request('apellidoCasada'),
                'birthDay' => request('birthDay'),
                'dpi' => request('dpi'),
                'mail' => request('mail'),
                'foto' => request()->file('foto')->store('public'),
                'password' => $password,
                'role' => request('role'),
                'solicitud' => 'pendiente'
            ]);
        } else {
            $user = User::create([
                'primerNombre' => request('primerNombre'),
                'segundoNombre' => request('segundoNombre'),
                'primerApellido' => request('primerApellido'),
                'segundoApellido' => request('segundoApellido'),
                'apellidoCasada' => request('apellidoCasada'),
                'birthDay' => request('birthDay'),
                'dpi' => request('dpi'),
                'mail' => request('mail'),
                'foto' => request()->file('foto')->store('public'),
                'password' => $password,
                'role' => request('role')
            ]);
        }
            
            $data = [
                'correo' => request('mail'),
                'password' => $password];
            Mail::to($mail)->send(new Mailclass($data));
            

            auth()->user($user);
            Session::flash('mensaje','Registro creado con exito.');
            return redirect()->route('admin.index');
    }

    /** 
    * @param int $id
    * @return \Illuminate\Http\Response
    * public function aceptar($id)
    */
    public function edit($id){
        $user = User::findOrfail($id);
        return view('admin.createUser', compact('user'));
    }

    /** 
    * @param int $id
    * @return \Illuminate\Http\Response
    * public function update($id)
    */
    public function update(Request $request, $id){
        $user = User::findOrfail($id);
        if($user->role == 'guest'){
            if($user->solicitud != 'pendiente'){
            $user->primerNombre = $request->input('primerNombre');
            $user->segundoNOmbre = $request->input('segundoNombre');
            $user->primerApellido = $request->input('primerApellido');
            $user->segundoApellido = $request->input('segundoApellido');
            $user->apellidoCasada = $request->input('apellidoCasada');
            $user->mail = $request->input('mail');
            $user->dpi = $request->input('dpi');
            $user->birthDay = $request->input('birthDay');
            $user->profesion = $request->input('profesion');
            $user->salario = $request->input('salario');
            $user->aniosLaborando = $request->input('aniosLaborando');
            $user->save();
            }
        } else {
            if($user->role != 'guest'){
                $user->primerNombre = $request->input('primerNombre');
                $user->segundoNOmbre = $request->input('segundoNombre');
                $user->primerApellido = $request->input('primerApellido');
                $user->segundoApellido = $request->input('segundoApellido');
                $user->primerApellido = $request->input('primerApellido');
                $user->apellidoCasada = $request->input('apellidoCasada');
                $user->birthDay = $request->input('birthDay');
                $user->dpi = $request->input('dpi');
                $user->mail = $request->input('mail');
                $user->save();
            }

            if($user->role == 'guest'){
                if($user->solicitud == 'pendiente'){
                    $user->primerNombre = $request->input('primerNombre');
                    $user->segundoNOmbre = $request->input('segundoNombre');
                    $user->primerApellido = $request->input('primerApellido');
                    $user->segundoApellido = $request->input('segundoApellido');
                    $user->primerApellido = $request->input('primerApellido');
                    $user->apellidoCasada = $request->input('apellidoCasada');
                    $mail = $user->mail = $request->input('mail');
                    $user->dpi = $request->input('dpi');
                    $solicitud = $user->solicitud = $request->get('select');
                    $user->birthDay = $request->input('birthDay');
                    $user->profesion = $request->input('profesion');
                    $user->salario = $request->input('salario');
                    $user->aniosLaborando = $request->input('aniosLaborando');
                    $user->save();
            $data = [
                'correo' => $user->mail,
                'solicitud' => $solicitud];
            Mail::to($mail)->send(new MailSolicitud($data));
            }
            
        }
        Session::flash('mensaje','Solicitud modificada con exito.');
        return redirect()->route('admin.index');
    }
    }

    /** 
    * @param int $id
    * @return \Illuminate\Http\Response
    * public function destroy($id)
    */
    public function destroy($id){
        $user = User::findOrfail($id);
        $user->estado = 'inactivo';
        $user->save();
        Session::flash('mensaje','Usuario modificado con exito.');
        return redirect()->route('admin.index');
    }
}
