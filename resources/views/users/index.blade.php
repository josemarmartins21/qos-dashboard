@use('Illuminate\Support\Str')
@use('App\Models\User')
@extends('layouts.app')

@section('title', 'Usuários')
    
@section('content')
<div id="container"> 
<x-alert />
    {{-- Form de pesquisa --}}
    <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('users.index') }}" method="get">
    
                    @csrf
    
                    <input type="search" name="search" id="searched" placeholder="Busque" autofocus>
                </form>
    
                <div id="btn-container">
                    <a href="{{ route('register') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
            </x-slot:header_index>
            <x-slot:container_cards>
                @if (count($users->toArray()) > 0)
                <x-table>
                    <x-slot:title>Utilizadores</x-slot:title>
                    <x-slot:thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Permissão</th>
                            <th>Ações</th>
                        </tr>
                    </x-slot:thead>
                        <x-slot:tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->permission }} </td>
                                    <td class="actions-column">
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="show-user">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                 
                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                            @csrf

                                            @method('Delete')
                                            
                                            <button class="delete" 
                                                    id="delete" 
                                                    onclick="return confirm('Tem cereteza que pretende eliminar este assunto?')">

                                                    <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot:tbody>
                    <x-slot:tfoot>
                        
                    </x-slot:tfoot>
                </x-table>
                @else 
                    <x-image-container>
                            <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">
        
                            <x-slot:btn_back>
                                    <a href="{{ route('users.index') }}">Voltar</a>
                            </x-slot:btn_back>
                    </x-image-container>
                @endif         
            </x-slot:container_cards>
            {{ $users->links('vendor.pagination.tailwind') }}
    </x-index_container>
</div>
@endsection