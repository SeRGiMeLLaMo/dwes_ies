<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
      //devuelve index hello world
    public function index()
    {
        //return 'Hello World';
        // ahora devolvemos todos los usuario en JSON
        $users = User::all();
        return response()->json($users);
    }

    //devuelve un usuario por id
    public function detail($id)
    {
        $user = User::find($id);

    //devolvemos 404 si el usuario no existe
        if (!$user) {
            //abort(404);
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
