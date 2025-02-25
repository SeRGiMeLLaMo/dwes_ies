<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

      public function create(){
        User::create([
            "name" => "Jose",
            "email" => "jose@gmail.org",
            "password"=> Hash::make('1234'),
            "age"=> 42,
            "address"=> "Calle Martinez50",
            "zip_code" => 15151515
        ]);

        User::create([
            "name" => "Alejandro",
            "email" => "Alejandro@gmail.es",
            "password"=> Hash::make('1234'),
            "age"=> 34,
            "address"=> "Calle Carreteros 8",
            "zip_code" => 151515
        ]);
       
    }
      
}
