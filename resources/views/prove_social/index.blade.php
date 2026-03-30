@use('Illuminate\Support\Str')

@extends('layouts.app')

@section('title', 'Clientes Renomado')
    
@section('content')
<div id="container">
<x-alert />

        <h2>Clientes Renomado</h2>

        {{-- Form de pesquisa --}}
        <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('client_prove_socials.index') }}" method="get">
                    
                    @csrf
                    
                    <input type="search" name="searched" id="searched" placeholder="Digite o nome de um cliente renomado" autofocus>
                </form>

                <div id="btn-container">
                    <a href="#" class="pdf-btn">
                        <i class="fa-solid fa-file-pdf"></i> Gerar PDF
                    </a>
                    
                    <a href="{{ route('client_prove_socials.create') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
            </x-slot:header_index>

            {{-- Cards de depoimentos --}}
            <x-slot:container_cards>

                   @forelse ($clientsProveSocials as $clientsProveSocial) 
                     <x-card>
 
                         <x-slot:top_card>
                             <div class="logo-card">
                                 <img 

                                 src="{{ '/images/logos_client/' . $clientsProveSocial->imagem }}" 

                                 alt="{{ $clientsProveSocial->company_role }}" >
                             </div>
                             
                             <a href="#" class="firm-name big-client">
                                {{ $clientsProveSocial->company_role }}
                            </a>
                             <a href="{{ $clientsProveSocial->url }}" title="{{ $clientsProveSocial->url }}" class="url" target="_blank">
                                {{ Str::limit($clientsProveSocial->url, 23, '...') }}
                             </a>
                         </x-slot:top_card>
 
                         <x-slot:btn_actions >
                            @if ($clientsProveSocial->is_active === 0)
                                <form action="{{ route('active') }}" method="POST" class="active">
                                    
                                    @csrf
                                    
                                    @method("PUT")
                                    
                                    <input type="hidden" name="type" value="prova social">

                                    <input type="hidden" name="id" id="id" value="{{ $clientsProveSocial->prove_social_id }}">
                                    
                                    <button class="disable" type="submit" title="Activar">
                                        <i class="fa-solid fa-eye-slash disable"></i>
                                    </button>
                                    
                                </form>
                            @else
                                <form action="{{ route('disable')}}" method="POST" class="active">
                                    @csrf
                                    
                                    @method("PUT")

                                    <input type="hidden" name="id" id="id" value="{{ $clientsProveSocial->prove_social_id }}">
                                    
                                    <input type="hidden" name="type" value="prova social">

                                    <button type="submit" title="Desactivar">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                
                                </form>
                            @endif
 
 
 
                             <div class="actions-btn">
                                 
                                 <a href="{{ route('client_prove_socials.edit', ['client_prove_social' => $clientsProveSocial->prove_social_id]) }}" class="edit">
                                     <i class="fa-solid fa-pen-to-square"></i>
                                 </a>
                                 
                                 <form action="{{ route('client_prove_socials.destroy', ['client_prove_social' => $clientsProveSocial->prove_social_id]) }}" method="post">
                                    @csrf

                                    @method('Delete')
                                    
                                    <button class="delete" id="delete">
                                         <i class="fa-solid fa-trash"></i>
                                     </button>
                                 </form>
                             </div>
                         </x-slot:btn_actions>
                     </x-card>    
                   @empty 
                   <x-image-container>
                       <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">

                       <x-slot:btn_back>
                            <a href="{{ route('client_prove_socials.index') }}">Voltar</a>
                       </x-slot:btn_back>
                   </x-image-container>
                   @endforelse                
            </x-slot:container_cards>
    </x-index_container>
</div>
@endsection