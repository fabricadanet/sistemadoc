<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependente;
use App\Models\User;


class DependenteController extends Controller
{
    public function index()
    {
        return view('cadastro.dependente.index');
    }

    public function create()
    {
        $user=auth()->user();
        return view('cadastro.dependente.create',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required',
            'parentesco' => 'required',
        ]);
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        $dependente = Dependente::create($data);
        redirect('cadastro.dependente.create')->with('success', 'Dependente cadastrado com sucesso!');

    }

    public function show($id)
    {
        $user = User::find($id);
        $dependentes=Dependente::where('user_id',$id)->get();


        return view('cadastro.dependente.show',compact('user','dependentes'));

    }

    public function update(Request $request, $id)
    {
        return view('cadastro.dependente.update');

    }

    public function destroy($id)
    {
        return view('cadastro.dependente.destroy');
    }
}
