<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::all();
        // dd("Hello World");
        //como segundo parámetro se le pasa un array con los datos que se quieren pasar a la vista

        //return view('user.index');

        

        //Se puede hacer de la siguiente manera
        //return view('user.index', ['users' => $users]);
        //pero cuando la clave y el valor son iguales se puede SIMPLIFICAR con compact de la siguiente manera
        return view('user.index', compact('users'));

        
      }

      
}
