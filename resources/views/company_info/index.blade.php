@use('Illuminate\Support\Str')
@use('App\Models\CompanyInfo')

@extends('layouts.app')

@section('title', 'Informações da QoS Tel')
    
@section('content')
<div id="container"> 
<x-alert />
    {{-- Form de pesquisa --}}
    <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('company_infos.index') }}" method="get">
    
                    @csrf
    
                    <input type="search" name="search" id="searched" placeholder="Busque uma informação" autofocus>
                </form>
    
                <div id="btn-container">
                    <a href="{{ route('company_infos.create') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
            </x-slot:header_index>
            <x-slot:container_cards>
                @if (count($companyInfos) > 0)
                <x-table>
                    <x-slot:title>Gerenciar Informações da Empresa</x-slot:title>
                    <x-slot:thead>
                        <tr>
                            <th>ID</th>
                            <th>Informação</th>
                            <th>Valor da Informação</th>
                            <th>Ações</th>
                        </tr>
                    </x-slot:thead>
                        <x-slot:tbody>
                            @foreach ($companyInfos->toArray()['data'] as $companyInfo)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $companyInfo['key'] }}
                                    </td>
                                    <td title="{{ $companyInfo['value'] }}">
                                        {{ Str::limit($companyInfo['value'], 50, '...') }}
                                    </td>
                                    <td class="actions-column">
                                        <a href="{{ route('company_infos.edit', ['company_info' => $companyInfo['id']]) }}" class="edit-column">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                 
                                        <form action="{{ route('company_infos.destroy', ['company_info' => $companyInfo['id']]) }}" method="post">
                                            @csrf

                                            @method('Delete')
                                            
                                            <button class="delete" id="delete" onclick="return confirm('Tem cereteza que pretende eliminar este assunto?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot:tbody>
                    <x-slot:tfoot>
                        <tr>
                            <th colspan="3" id="foot-header">Total</th>
                            <td>{{ CompanyInfo::count() }}</td>
                        </tr>
                    </x-slot:tfoot>
                </x-table>
                @else 
                    <x-image-container>
                            <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">
        
                            <x-slot:btn_back>
                                    <a href="{{ route('company_infos.index') }}">Voltar</a>
                            </x-slot:btn_back>
                    </x-image-container>
                @endif         
            </x-slot:container_cards>
            {{ $companyInfos->links() }}
    </x-index_container>
</div>
@endsection