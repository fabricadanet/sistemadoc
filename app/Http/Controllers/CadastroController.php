<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cadastro;


class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.associado.index');
    }

    public function create (){
        $user = auth()->user();
        return view('cadastro.associado.create', compact('user'));
    }
     public function store(Request $request){
        $user = auth()->user();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $funcao = implode(',', $data['funcao']);
        $data['funcao'] = $funcao;
        $_turnos_cc = implode(',', $data['turnos_cc']);
        $data['turnos_cc'] = $_turnos_cc;
        $_turnos_xla = implode(',', $data['turnos_xla']);
        $data['turnos_xla'] = $_turnos_xla;

        $cadastro = Cadastro::create($data);

        $user->update(['cadastro_id' => $cadastro->id, 'telefone' => $data['telefone']]);

      return view('cadastro.associado.show', compact('cadastro'));


     }
     public function edit($id){
        $cadastro = Cadastro::where('user_id', $id)->first();
        return view('cadastro.associado.edit', compact('cadastro'));
     }

     public function show($id){
         $user= auth()->user();
        $cadastro = Cadastro::where('user_id', $user->id)->first();

            return view('cadastro.associado.show', compact('cadastro'));

     }

     public function showAssociado($id){

         $cadastro = Cadastro::where('user_id', $id)->first();

         return view('cadastro.associado.show', compact('cadastro'));
     }

        public function update(Request $request, $id){
            return view('cadastro.associado.update');

        }

        public function destroy($id){
            return view('cadastro.associado.destroy');
        }

        public function createAdmin(){
            return view('cadastro.associado.adminCreate');

        }

        public function storeAdmin(Request $request){
            $data = $request->all();
            var_dump($data);
            $user = User::create([
                'name' => $data['nome'],
                'email' => $data['email'],
                'password' => Hash::make($data['cpf']),
        ]);
        $data['user_id'] = $user->id;
        $funcao = implode(',', $data['funcao']);
        $data['funcao'] = $funcao;
        $_turnos_cc = implode(',', $data['turnos_cc']);
        $data['turnos_cc'] = $_turnos_cc;
        $_turnos_xla = implode(',', $data['turnos_xla']);
        $data['turnos_xla'] = $_turnos_xla;

        $cadastro = Cadastro::create($data);

        $user->update(['cadastro_id' => $cadastro->id, 'telefone' => $data['telefone']]);

      return redirect()->route('users.index');

        }

    function destroyAssociado($id){
        $user = User::find($id);
        $user->cadastro()->delete();
        $user->delete();
        return redirect()->route('users.index');
    }

}