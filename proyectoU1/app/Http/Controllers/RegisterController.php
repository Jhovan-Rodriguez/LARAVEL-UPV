<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Método para crear cuenta
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request->username);
        //Modificamos el Request para que no se repitan los "username"
        //$request->request->add(['username'=>Str::slug($request->username)]); 
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'',
        ]);

        //Invocar el modelo User para crear el registro
        User::create([
            'name'=>$request->name,
            //Insertar username sin espacios y en minusculas
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)

        ]);
        //Autenticar un usuario con el método "attemp"
        //Opción 1
            //auth()->attempt([
            //    'email'=>$request->email,
            //    'password'=>$request->password
            //]);
        //Opcion 2
        auth()->attempt($request->only('email','password'));

        //Redireccionando
        return redirect()->route('post.index');    
    }
}
