<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function index($tipo)
    {
        // dd($tipo);

        $users = 0;

        if( $tipo == 'profesor' ){
            $users = User::where('role','!=','alumno')->get();
        }
        else if ( $tipo == 'alumno' ) {
            $users = User::where('role','alumno')->get();
        }
        else{
            $users = User::all();
        }

        // dd($user);
        // $users = User::paginate();

        return view('user.index', compact('users','tipo'))->with('i', 0);
    }

    public function create($tipo)
    {
        if ($tipo == 'alumno') {
            $extension_email = "@alu.edu.gva.es";
        }
        else{
            $extension_email = "@edu.gva.es";
        }
        $user = new User();
        $ciclos = Ciclo::all();
        return view('user.create', compact('user','tipo','ciclos','extension_email'));
    }

    public function store(Request $request)
    {
        if ($request->role == 'alumno') {
            request()->merge([
                "email" => request()->email .= "@alu.edu.gva.es",
            ]);        }
        else{
            request()->merge([
                "email" => request()->email .= "@edu.gva.es",
                "num_documento" =>Str::upper(request()->num_documento)
            ]);
        }

        // dd($request);

        $validacion = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'apellido1' => 'required | max:50',
            'apellido2' => 'max:50',
            'role' => 'required|in:alumno,profesor,administrador',
            'tipo_documento' => 'required | required|in:DNI,NIA',
            'num_documento' => 'required | max:9 | unique:users,num_documento',
            'ciclos' => 'required',
        ]);

        // Encriptamos la contraseña automaticamente
        // PROFESOR(DNI) -- ALUMNO (NIA)
        $validacion['password'] = bcrypt($request->num_documento);
        User::create( $validacion );

        //CREAMOS LAS RELACIONES EN LA TABLA INTERMEDIA
        $usuario_creado = User::where('num_documento',$request->num_documento)->get();
        $this->insertarTablaIntermedia( $usuario_creado[0]->id , $request->ciclos );

        // REDIRIGIMOS A LA LISTA DE USUARIOS
        $tipo = 0;
        if ($request->role == 'alumno') {
            $tipo = 'alumno';
        }
        else{
            $tipo = 'profesor';
        }

        return redirect()->route('users.index',$tipo)
        ->with('success', Str::upper($request->role).' añadido con exito');

    }

    public function insertarTablaIntermedia($id_usuario ,$id_ciclo){

        $coleccion_ciclos = Ciclo::find($id_ciclo);
        $usuario = User::findOrFail($id_usuario);

        $usuario -> ciclos() -> attach($coleccion_ciclos);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $ciclos = Ciclo::all();

        return view('user.edit', compact('user','ciclos'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        $validacion = request()->validate([
            'name' => 'required',
            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($user->email,'email'),
            ],
            'apellido1' => 'required',
            'apellido2' => 'max:50',
            'password' => 'required|min:6',
            'role' => 'required|in:alumno,profesor,administrador',
            'tipo_documento' => 'required | required|in:DNI,NIA',
            'num_documento'=>[
                'required',
                'max:20',
                Rule::unique('users')->ignore($user->num_documento,'num_documento'),
            ],
            'ciclos' => 'required',
        ]);

        if ($validacion['password'] != $user->password) { // Si hay diferencias
            $validacion['password'] = bcrypt( request()->password ); // Encriptamos la contraseña
        }// sino, no hacemos nada para no encriptar la contraseña ya encriptada

        // $user->update($request->all());
        User::find($user->id)->update($validacion);
        User::find($user->id)->ciclos()->sync( $request->ciclos );

        // return redirect()->route('users.index')
        //     ->with('success', 'User updated successfully');

        // REDIRIGIMOS A LA LISTA DE USUARIOS
        $tipo = 0;
        if ($request->role == 'alumno') {
            $tipo = 'alumno';
        }
        else{
            $tipo = 'profesor';
        }

        return redirect()->route('users.index',$tipo)
        ->with('success', Str::upper($request->role).' añadido con exito');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $tipo = $user->role;
        $user->delete();

        return redirect()->route('users.index',$tipo)->with('success', Str::upper($user->role).' eliminado con exito');
    }
}
