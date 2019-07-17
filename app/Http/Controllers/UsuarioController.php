<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsuarioController extends Controller
{
    public function dados()
    {
        $user = Auth::user();
        return view('dados',compact('user'));
    }

    public function atualizaDados(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);
        $dados = $request->all();
        
        
        $user = Auth::user();
        $user->name = $dados['name'];
        $user->email = $dados['email'];
        if(!is_null($request->password))
        {
            $dados['password'] = bcrypt($dados['password']);
            $user->password = $dados['password'];
        }
        $user->save();
            

        return back()->withSuccess('Dados Cadastrais alterados com sucesso!');
    }

    public function listaUsuarios()
    {
        $users = User::all();
        return view('usuarios.lista_usuarios',compact('users'));
    }
}
    

