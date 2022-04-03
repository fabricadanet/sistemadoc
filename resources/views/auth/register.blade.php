@extends('layouts.guest')

@section('content')
    <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('Crie uma nova conta') }}</h2>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="city" id="flexRadioDefault1" value="capao_da_canoa"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Capaão da Canoa
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="city" id="flexRadioDefault2" value="xangrila">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Xangri-lá
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Nome Completo') }}</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('Digite o seu nome completo') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Email ') }}</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('Digite o seu email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Senha') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Digite a sua senha') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('Repita a senha') }}</label>
                <input type="password" name="password_confirmation"
                    class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                    placeholder="{{ __('Repita a sua senha') }}">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Criar nova conta') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('login'))
        <div class="text-center text-muted mt-3">
            {{ __('Eu já possuo uma conta.') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('Entrar') }}</a>
        </div>
    @endif
@endsection
