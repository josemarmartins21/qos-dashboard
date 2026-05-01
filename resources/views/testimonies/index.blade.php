@use('Illuminate\Support\Str')

@extends('layouts.app')

@section('title', 'Depoimentos')
    
@section('content')

<div id="container">
<x-alert />

        <h2>Depoimentos</h2>

        {{-- Form de pesquisa --}}
        <x-index_container class="testiomonies-index">
            <x-slot:header_index>
                <form action="{{ route('testimonies.index') }}" method="get" >
                    
                    @csrf

                    <input type="search" name="search" id="" placeholder="Busque">
                </form>


            </x-slot:header_index>

            {{-- Cards de depoimentos --}}
            <x-slot:container_cards>

                @forelse ($testimonies->toArray()['data'] as $testimony)
                    {{-- Card de depoimentos --}}
                    <x-card>
                        <x-slot:top_card>
                            <a href="{{ route('testimonies.show', ['testimony' => $testimony->id]) }}">{{ $testimony->nome }}</a>

                            <span>{{ $testimony->cargo }}</span>

                            <p class="card-paragrafo">
                                {{ Str::limit($testimony->testimony, 110, '...') }}
                            </p>
                        </x-slot:top_card>

                        <x-slot:btn_actions>
                            @can ('access-admin-area') 
                                @if ($testimony->is_active === 0)
                                    <form action="{{ route('active') }}" method="POST" class="active">
                                        
                                        @csrf
                                        
                                        @method("PUT")
                                        
                                        <input type="hidden" name="type" value="depoimento">
    
                                        <input type="hidden" name="id" id="id" value="{{ $testimony->id }}">
                                        
                                        <button class="disable" type="submit" title="Activar">
                                            <i class="fa-solid fa-eye-slash disable"></i>
                                        </button>
                                        
                                    </form>
                                @else
                                        <form action="{{ route('disable')}}" method="POST" class="active">
                                            @csrf
                                            
                                            @method("PUT")
    
                                            <input type="hidden" name="id" id="id" value="{{ $testimony->id }}">
                                            
                                            <input type="hidden" name="type" value="depoimento">
    
                                            <button type="submit" title="Desactivar">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        
                                        </form>
                                @endif
                            @endcan

                            <div class="actions-btn">
                                
                                <a href="{{ route('testimonies.edit', ['testimony' => $testimony->id]) }}" class="edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                
                                <form action="{{ route('testimonies.destroy', ['testimony' => $testimony->id]) }}" method="post">

                                    @csrf

                                    @method('Delete')

                                    <button class="delete" id="delete" onclick="return confirm('Tem cereteza que pretende eliminar este depoimento?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </x-slot:btn_actions>
                    </x-card>
                    {{-- Fim do Card de depoimento --}}
                    
                @empty
                    <x-image-container>
                       <img src="{{ asset('images/void.png') }}" alt="Imagem de documentos em branco">

                       <x-slot:btn_back>
                            <a href="{{ route('testimonies.index') }}">Voltar</a>
                       </x-slot:btn_back>
                   </x-image-container>
                @endforelse
            </x-slot:container_cards>
            {{ $testimonies->links() }}
    </x-index_container>
</div>
<x-add-btn class="float-btn btn-plus" href="{{ route('testimonies.create') }}"></x-add-btn>
@endsection