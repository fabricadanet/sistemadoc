<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $user->update(['cadastro_id' => $cadastro->id]);

        redirect('cadastro.associado.index');

     }

     public function show($id){
         $user= auth()->user();
        $cadastro = Cadastro::where('user_id', $user->id)->first();

            return view('cadastro.associado.show', compact('cadastro'));

     }

        public function update(Request $request, $id){
            return view('cadastro.associado.update');

        }

        public function destroy($id){
            return view('cadastro.associado.destroy');
        }

}