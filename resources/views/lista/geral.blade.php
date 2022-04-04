@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Lista de Presença Geral') }}
            </h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        Aqui o administrador poderá gerar uma lista de presença de todos os associados cadastrados.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
