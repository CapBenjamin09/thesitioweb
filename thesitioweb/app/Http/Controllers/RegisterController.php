<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailclass;
use App\Models\User;

class RegisterController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        

        if(isset($_POST['submit'])){
            $profesion = $_POST['profesion'];
            if(empty($profesion)){
                $request->validate([
                    'primerNombre' => 'required',
                    'segundoNombre' => 'required',
                    'primerApellido' => 'required',
                    'segundoApellido' => 'required',
                    'birthDay' => 'required|before_or_equal:2004-06-06',
                    'dpi' => ['required','digits:13','unique:users'],
                    'foto' => 'required|mimes:jpg,png,jpeg',
                    'mail' => ['required','email','unique:users']
                ]);
            } else {
                $request->validate([
                    'primerNombre' => 'required|max:50',
                    'segundoNombre' => 'required|max:50',
                    'primerApellido' => 'required|max:50',
                    'segundoApellido' => 'required|max:50',
                    'aniosLaborando' => ['required','gte:1'],
                    'salario' => 'required|numeric',
                    'birthDay' => 'required|before_or_equal:2004-06-06',
                    'dpi' => ['required','digits:13','unique:users'],
                    'foto' => 'required|mimes:jpg,png,jpeg',
                    'mail' => ['required','email','unique:users']
                ]);
            }
            $mail = $_POST['mail'];
            //$usuario = (new Usuario)->fill( $request->only('primerNombre','segundoNombre','primerApellido','segundoApellido', 'apellidoCasada', 'profesion', 'aniosLaborando', 'salario' ,'birthDay','dpi', 'mail'));
            //$usuario -> foto = $request->file('foto')->store('public');
            //$usuario -> password = Hash::make($password);
            //$usuario -> save();
            //$user = Usuario::create(request()->only('primerNombre','segundoNombre','primerApellido','segundoApellido', 'apellidoCasada', 'profesion', 'aniosLaborando', 'salario' ,'birthDay','dpi', 'mail'));
            $user = User::create([
                'primerNombre' => request('primerNombre'),
                'segundoNombre' => request('segundoNombre'),
                'primerApellido' => request('primerApellido'),
                'segundoApellido' => request('segundoApellido'),
                'apellidoCasada' => request('apellidoCasada'),
                'profesion' => request('profesion'),
                'aniosLaborando' => request('aniosLaborando'),
                'salario' => request('salario'),
                'birthDay' => request('birthDay'),
                'dpi' => request('dpi'),
                'mail' => request('mail'),
                'foto' => request()->file('foto')->store('public'),
                'password' => $password,
                'role' => 'guest',
                'solicitud' => 'pendiente'
            ]);
            $data = [
                'correo' => request('mail'),
                'password' => $password];
            Mail::to($mail)->send(new Mailclass($data));
            

            auth()->user($user);
            Session::flash('mensaje','Registro creado con exito, revisa tu email.');
            return redirect()->route('login.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
