<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function dados()
    {
        $user = Auth::user();
        return view('dados',compact('user'));
    }

    public function atualizaDados(Request $request)
    {
        //validação
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);
        $dados = $request->all();
        
        //atualização dos dados cadastrais
        $user = Auth::user();
        $user->name = $dados['name'];
        $user->email = $dados['email'];

        //atualiza a senha se ela foi mandada
        if(!is_null($request->password))
        {
            $dados['password'] = bcrypt($dados['password']);
            $user->password = $dados['password'];
        }
        //tenta salvar o usuário no banco
        try{
            $user->save();
        }catch(\PDOException $e){
            return back()->withErro('Ocorreu um erro ao tentar salvar seus dados');
        }
        
        return back()->withSuccess('Dados Cadastrais alterados com sucesso!');
    }

    public function listaUsuarios()
    {
        $users = User::all();
        $perfis = [
            0   => 'Administrador',
            1   => 'Básico'
        ];
        return view('usuarios.lista_usuarios',compact('users','perfis'));
    }
    public function incluirUsuarios()
    {
        return view('usuarios.incluir_usuarios',compact('perfis'));
    }
    
    public function gravarUsuarios(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'tipo' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $dados = $request->all();
        
        $dados['password'] =  Hash::make($dados['password']);
        //tenta salvar o usuário no banco
        try{
            User::create($dados);
        }catch(\PDOException $e){
            return back()->withErro('Ocorreu um erro ao tentar inserir o usuário');
        }
        
        return back()->withSuccess('Usuário cadastrado com sucesso!');
    }

    public function editarUsuarios($id)
    {
        $user = User::find($id);
        $perfis = [
            0   => 'Administrador',
            1   => 'Básico'
        ];

        return view('usuarios.editar_usuarios',compact('user','perfis'));
    }

    public function atualizarUsuarios(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);
        $dados = $request->all();
        
        //atualização dos dados cadastrais
        $user           = User::find($dados['user_id']);
        $user->name     = $dados['name'];
        $user->email    = $dados['email'];
        $user->tipo     = $dados['tipo'];

        //atualiza a senha se ela foi mandada
        if(!is_null($request->password))
        {
            $dados['password'] = bcrypt($dados['password']);
            $user->password = $dados['password'];
        }
        //tenta salvar o usuário no banco
        try{
            $user->save();
        }catch(\PDOException $e){
            return back()->withErro('Ocorreu um erro ao tentar atualizar o usuário');
        }
        
        return back()->withSuccess('Usuário alterado com sucesso!');
    }
}
    

