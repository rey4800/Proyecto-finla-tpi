<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Symfony\Contracts\Service\Attribute\Required;
use App\Exceptions\Handler;
use Exception;
class RegistroController extends Controller
{
    //funcion para enviar a la vista register
    public function create(){

        return view('auth.register');

        
    }



    //funcion para registrar un usuario en la base de datos
    public function store(){
       
        try {
            $this->validate(request(),[
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed'
            ]);
   
               $user = User::create(request(['name','email','password']));
   
               auth()->login($user);
              return redirect()->to('/');


        } catch (\Throwable $error) {
            return redirect()->to('/register?code=error');
        }
         
         
      
      
    }
}
