<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //funcion para cerrar sesión
    public function store(){
        //Cerrar sesión en con el helper auth implementando el método logout
        auth()->logout();
        return redirect()->route('login');
    }
}
