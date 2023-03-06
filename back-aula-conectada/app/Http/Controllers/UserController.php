<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            $users = User::where('role','profesor')->get();
        }
        else if ( $tipo == 'alumno' ) {
            $users = User::where('role','alumno')->get();
        }
        else{
            $users = User::all();
        }

        // dd($user);
        // $users = User::paginate();

        return view('user.index', compact('users'))->with('i', 1);
    }

    public function create($tipo)
    {
        dd($tipo);
        $user = new User();
        return view('user.create', compact('user'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
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
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
