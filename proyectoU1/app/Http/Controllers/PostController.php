<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Constructor para la protección de la url dashboard
    //El constructor es lo que se ejecuta cuando haces una instacia al contructor
    public function __construct(){
        //Protegemos la URL
        //Al método index con el constructor le pasamos el parámetro de autentificación
        $this->middleware('auth');
    }


    public function index(User $user){
        return view('dashboard',[
            'user'=>$user
        ]);
    }
}
