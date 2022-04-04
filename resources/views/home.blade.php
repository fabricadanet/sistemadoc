@extends('layouts.app')

@section('custom_styles')
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="alert alert-success">
                <div class="alert-title">
                    {{ __('Bem-vindo(a)') }} {{ auth()->user()->name ?? null }}
                </div>
                <div class="text-muted">
                    Area restrita do associado. Aqui poderão ser disponibilizados documentos para downloads, links ou
                    notícias do site para os associados, e muito mais...

                </div>
            </div>

        </div>
    </div>
@endsection
