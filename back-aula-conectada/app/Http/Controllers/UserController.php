<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
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

        return view('user.index', compact('users','tipo'))->with('i', 1);
    }

    public function create($tipo)
    {
        // dd($tipo);
        $user = new User();
        $ciclos = Ciclo::all();
        return view('user.create', compact('user','tipo','ciclos'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validacion = request()->validate([
            'name' => 'required',
            'email' => 'required|email| unique:users,email',
            'apellido1' => 'required',
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

        $tipo = 0;
        if ($request->role == 'alumno') {
            $tipo = 'alumno';
        }
        else{
            $tipo = 'profesor';
        }

        // return redirect()->route('users.index')
        //     ->with('success', 'User created successfully.');
            return redirect()->route('users.index',$tipo)->with('success', Str::upper($request->role).' añadido con exito');

    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $tipo = $user->role;
        $user->delete();

        return redirect()->route('users.index',$tipo)->with('success', Str::upper($user->role).' eliminado con exito');
    }
}
