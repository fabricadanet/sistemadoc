<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cadastro;

class ListaController extends Controller
{
    public function index()
    {
        $cadastros = Cadastro::orderBy('nome')->get();

        return view('lista.geral', compact('cadastros'));
    }

    public function listaCapao()
    {
        $cadastros = Cadastro::where('autorizacao', 'Capão da Canoa')->orderBy('nome')->get();

        return view('lista.capao', compact('cadastros'));
    }

    public function listaXangrila()
    {
        $cadastros = Cadastro::where('autorizacao', 'Xangri-Lá')->orderBy('nome')->get();

        return view('lista.xangrila', compact('cadastros'));
    }
}
