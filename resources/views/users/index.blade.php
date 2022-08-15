@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <h2 class="page-title">
                {{ __('Associados') }}
            </h2>
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
                        @forelse ($users as $user)
                        
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telefone }}</td>
                                    <td>
                                    {{ $user->cadastro ? $user->cadastro->data_associacao  : __('Não Informado') }}

                                    </td>
                                    <td>
                                        @if($user->cadastro_id )
                                        
                                            <a href="{{ route('associado.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                                {{ __('Editar') }}
                                            </a>
                                        
                                        @else
                                        
                                            <a href="{{ route('associado.create', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i>
                                                {{ __('Cadastrar') }}
                                            </a>
                                           
                                        
                                        @endif
                                    </td>

                                </tr>
                                @empty
                                     <p>Não há Associados Cadastrados!</p>
                                 @endforelse
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
