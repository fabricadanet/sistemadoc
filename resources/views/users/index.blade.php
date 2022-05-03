@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="page-title">
                    {{ __('Associados') }}
                </h2>
                <form action="{{ route('users.search') }}" method="post" class="">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="{{ __('Pesquisar') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Pesquisar
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-success" href="{{ route('users.index') }}">
                    Listar todos
                </a>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Nome') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Telefone') }}</th>
                                <th>{{ __('Data de Associação') }}</th>
                                <th>{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ date('d/m/Y', strtotime($user->data_associacao)) }}</td>
                                        </td>
                                        <td>
                                            <a href="{{ route('cadastros.associado.ver', $user->id) }}"
                                                class="btn btn-primary">
                                                {{ __('Ver') }}
                                            </a>
                                            <a href="{{ route('cadastros.associado.destroy', $user->id) }}"
                                                class="btn btn-danger">
                                                {{ __('Excluir') }}
                                            </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr></tr>
                                <td colspan="5">
                                    {{ __('Nenhum registro encontrado') }}
                                </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                @if ($users->hasPages())
                    <div class="card-footer pb-0">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
