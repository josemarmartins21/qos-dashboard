@use('Illuminate\Support\Str')
@use('App\Models\Visitor')

@extends('layouts.app')

@section('title', 'Visitantes e Mensagens')
    
@section('content')

<div id="container"> 
<x-alert />
        <h2>Visitantes e Mensagens</h2>

        {{-- Form de pesquisa --}}
        <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('visitors.index') }}" method="get">
                    
                    @csrf
                    
                    <input type="search" name="searched" id="searched" placeholder="Busque " autofocus>
                </form>

                <div id="btn-container">
                    <a href="{{ route('subjects.index') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Assuntos
                    </a>
                </div>
            </x-slot:header_index>

            <x-slot:container_cards>
                @if (count($visitors) > 0)
                <x-table>
                    <x-slot:title>Visitantes</x-slot:title>
                    <x-slot:thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </x-slot:thead>
                    <x-slot:tbody>
                        @foreach ($visitors as $visitor) 
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $visitor->nome }}</td>
                                <td>{{ $visitor->tel }}</td>
                                <td>{{ $visitor->email }}</td>
                                <td>
                                    <a href="#" class="base-btn ler" id="delete-btn-table">
                                        Ler mensagem
                                    </a>

                                    <form action="" method="" id="form-table">
                                        {{-- @csrf('Delete') --}}

                                        <button {{-- type="submit" --}} class="base-btn apagar" >Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                    </x-slot:tbody>
                    <x-slot:tfoot>
                        <tr>
                        <th colspan="4" id="foot-header">Total</th>
                        <td>{{ Visitor::count() }}</td>
                    </tr>    
                    </x-slot:tfoot>  
                </x-table>
                @else 
                    <x-image-container>
                        <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">
    
                        <x-slot:btn_back>
                                <h2>Sem Mensagens</h2>
                        </x-slot:btn_back>
                    </x-image-container>
                @endif               
            </x-slot:container_cards>
    </x-index_container>
</div>
@endsection