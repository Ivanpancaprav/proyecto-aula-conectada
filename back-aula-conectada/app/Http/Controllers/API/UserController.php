<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function indexProfesores(){

        $users = User::where('role','!=','alumno')->get();    
        return $users;
    }

    public function indexAlumnos(){

        $users = User::where('role','alumno')->get();    
        return $users;
    }


    public function show($id){
        $user = User::find($id);
        return $user;
    }

    public function editPassword(Request $request){ // Cambiar la contraseña a una que queramos
        $user = User::find($request->id);

        $nuevo_password = clone $user;
        $nuevo_password->password = bcrypt($request->password);
        
        $user->update( $nuevo_password->toArray() );

        return $user;
    }

    public function restorePassword($id){ // Formatear la contraseña por defecto (NIA/DNI)
        $user = User::find($id);

        $nuevo_password = clone $user;
        $nuevo_password->password = bcrypt($user->num_documento);

        $user->update( $nuevo_password->toArray() );

        return $user;
    }
}
