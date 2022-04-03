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

                </div>
            </div>

        </div>
    </div>
@endsection
