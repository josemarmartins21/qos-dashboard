@use('Illuminate\Support\Str')

@extends('layouts.app')

@section('title', 'Perguntas Frequentes')
    
@section('content')
<div id="container"> 
<x-alert />
        <h2>Perguntas Frequente</h2>

        {{-- Form de pesquisa --}}
        <x-index_container>
            <x-slot:header_index>
                <form action="{{ route('questions.index') }}" method="get">
                    
                    @csrf
                    
                    <input type="search" name="searched" id="searched" placeholder="Busque uma pergunta" autofocus>
                </form>

                <div id="btn-container">
                    <a href="#" class="pdf-btn">
                        <i class="fa-solid fa-file-pdf"></i> Gerar PDF
                    </a>
                    
                    <a href="{{ route('questions.create') }}" class="mais-depoimentos">
                        <i class="fa-solid fa-plus"></i> Adicionar
                    </a>
                </div>
            </x-slot:header_index>

            {{-- Cards de depoimentos --}}
            <x-slot:container_cards>

                   @forelse ($questions as $question) 
                     <x-card>
 
                         <x-slot:top_card>
                            <h2 class="question"> {{ Str::limit(ucfirst($question['question']), 41, '...?') }}</h2>
                            
                            <a href="#" class="ver-resposta">Ler resposta</a>
                         </x-slot:top_card>
 
                         <x-slot:btn_actions >
                            @can ('adm') 
                                @if ($question['is_active'] === 0)
                                    <form action="{{ route('active') }}" method="POST" class="active">
                                        
                                        @csrf
                                        
                                        @method("PUT")
                                        
                                        <input type="hidden" name="type" value="pergunta frequente">
    
                                        <input type="hidden" name="id" id="id" value="{{ $question['id'] }}">
                                        
                                        <button class="disable" type="submit" title="Activar">
                                            <i class="fa-solid fa-eye-slash disable"></i>
                                        </button>
                                        
                                    </form>
                                @else 
                                    <form action="{{ route('disable')}}" method="POST" class="active">
                                        
                                        @csrf
                                        
                                        @method("PUT")
    
                                        <input type="hidden" name="id" id="id" value="{{ $question['id'] }}">
                                        
                                        <input type="hidden" name="type" value="pergunta frequente">
    
                                        <button type="submit" title="Desactivar">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    
                                    </form>
                                @endif
                            @endcan
                                   
                             <div class="actions-btn">
                                 
                                 <a href="{{ route('questions.edit', ['question' => $question['id']]) }}" class="edit">
                                     <i class="fa-solid fa-pen-to-square"></i>
                                 </a>
                                 
                                 <form action="{{ route('questions.destroy', ['question' => $question['id']]) }}" method="post">
                                    @csrf

                                    @method('Delete')
                                    
                                    <button class="delete" id="delete" onclick="return confirm('Tem cereteza que pretende eliminar esta pergunta frequente?')">
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
                            <a href="{{ route('questions.index') }}">Voltar</a>
                       </x-slot:btn_back>
                   </x-image-container>
                   @endforelse                
            </x-slot:container_cards>
    </x-index_container>
</div>
@endsection