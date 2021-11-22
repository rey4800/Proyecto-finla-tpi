<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SessionsController extends Controller
{
    //funcion que  sirve par ir al login
    public function create(){

        return view('auth.login');
    }

    //funcion para iniciar session
    public function store(){
        if (auth()->attempt(request(['email','password']))== false) {
            return back()->withErrors([
                'message' => 'El imail o la contraseña son incorrectos, por favor intentelo otra vez'
            ]);
        }

        return redirect()->to('/');
    }

    //funcion para cerrar session 
    public function destroy(){
        auth()->logout();
        
        return redirect()->to('/');
    }

}
