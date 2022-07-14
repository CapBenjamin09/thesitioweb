<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Mailclass;
use App\Mail\MailSolicitud;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class OperatorController extends Controller
{
    public function index()
    {
        $users = User::paginate(10)->where('role','guest')->where('solicitud','pendiente');

        return view('operator.index')
            ->with('users', $users);
    }
    
    /** 
    * @param int $id
    * @return \Illuminate\Http\Response
    * public function aceptar($id)
    */
    public function edit($id){
        $user = User::findOrfail($id);
        return view('operator.edit', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::findOrfail($id);
        $solicitud = $user->solicitud = $request->get('select');
        $user->save();
        $mail = $user->mail;
        $data = [
            'correo' => $user->mail,
            'solicitud' => $solicitud];
        Mail::to($mail)->send(new MailSolicitud($data));
        Session::flash('mensaje','Solicitud modificada con exito.');
        return redirect()->route('operator.index');
    }
}
