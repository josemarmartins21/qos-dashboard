@use('Illuminate\Support\Str')
@use('App\Models\Subject')

@extends('layouts.app')

@section('title', 'Assuntos')
    
@section('content')
<div id="container"> 
<x-alert />
    {{-- Form de pesquisa --}}
    <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('subjects.index') }}" method="get">
    
                    @csrf
    
                    <input type="search" name="searched" id="searched" placeholder="Busque um assunto" autofocus>
                </form>
    
                <div id="btn-container">
                    <a href="#" class="pdf-btn">
                        <i class="fa-solid fa-file-pdf"></i> Gerar PDF
                    </a>
    
                    <a href="{{ route('subjects.create') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
            </x-slot:header_index>
            <x-slot:container_cards>
                @if (count($subjects) > 0)
                <x-table>
                    <x-slot:title>Gerenciar Assuntos das Mensagens</x-slot:title>
                    <x-slot:thead>
                        <tr>
                            <th>ID</th>
                            <th>Assunto</th>
                            <th>Ações</th>
                        </tr>
                    </x-slot:thead>
                        <x-slot:tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $subject['subject'] }}
                                    </td>
                                    <td>
                                        <a href="#">Editar</a>
                                        <a href="#">Apagar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot:tbody>
                    <x-slot:tfoot>
                        <tr>
                            <th colspan="2" id="foot-header">Total</th>
                            <td>{{ Subject::count() }}</td>
                        </tr>
                    </x-slot:tfoot>
                </x-table>
                @else 
                    <x-image-container>
                            <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">
        
                            <x-slot:btn_back>
                                    <a href="{{ route('subjects.index') }}">Voltar</a>
                            </x-slot:btn_back>
                    </x-image-container>
                @endif         
            </x-slot:container_cards>
    </x-index_container>
</div>
@endsection