@use('App\Models\Message')
@use('Illuminate\Support\Facades\Auth')

@extends('layouts.app')

@section('title', 'Página Inicial')


@section('content')
<section id="principal">
    <h2>Resumo Rápido</h2>
    <article id="overview-container">
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-solid fa-people-roof green-icon"></i> {{ $datas['prove_social_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Clientes Renomados Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-brands fa-stack-exchange green-icon"></i> {{ $datas['testimonies_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Depoimentos Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                    <h3><i class="fa-solid fa-file-circle-question yellow-icon"></i> {{ $datas['questions_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Total de FAQ activas</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3> <i class="fa-solid fa-message red-icon"></i> {{ $datas['messages_unread'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Mensagens não lidas</span>
            </div>
        </aside>
    </article> <!-- Fim article overview -->


    @if (count($visitors) > 0)
                <x-table>
                    <x-slot:title>Últitmas Mensagens</x-slot:title>
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
                        @if ($loop->index > 3)
                            @break
                        @endif
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $visitor->nome }}</td>
                                <td>{{ $visitor->tel }}</td>
                                <td>{{ $visitor->email }}</td>
                                <td>
                                    @if (isset($visitor->message_id)) 
                                    <a href="{{ route('messages.show', ['message' => $visitor->message_id]) }}" class="base-btn ler" id="delete-btn-table">
                                        @if ($visitor->lida == false)
                                            <i class="fa-solid fa-circle"></i> 
                                        @endif
                                        
                                        Ler mensagem
                                    </a>

                                    <form action="{{ route('messages.destroy', ['message' => $visitor->message_id]) }}" method="POST" id="form-table">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="base-btn apagar" onclick="return confirm('Tem a certeza que deseja eliminar?')">
                                            <i class="fa-solid fa-trash"></i> Apagar
                                        </button>
                                    </form>
                                    @else
                                        Sem Mensagem
                                    @endif
                                </td>
                            </tr>
                        @endforeach    
                    </x-slot:tbody>
                    <x-slot:tfoot>
                        <tr>
                        <th colspan="4" id="foot-header">Total</th>
                        <td>{{ Message::count() }}</td>
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
  
</section>
@endsection