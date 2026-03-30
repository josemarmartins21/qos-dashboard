@extends('layouts.app')

@section('title', 'Página Inicial')


@section('content')
@use('App\Models\Visitor')
<section id="principal">
    <h2>Resumo Rápido</h2>
    <article id="overview-container">
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-solid fa-people-roof"></i> {{ $datas['prove_social_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Clientes Renomados Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3><i class="fa-brands fa-stack-exchange"></i> {{ $datas['testimonies_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Depoimentos Activo</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                    <h3><i class="fa-solid fa-file-circle-question"></i> {{ $datas['questions_active'] }}</h3>
            </div>

            <div class="overview-bottom">
                <span>Total de FAQ activas</span>
            </div>
        </aside>
        <aside class="overview">
            <div class="overview-top">
                <h3> <i class="fa-solid fa-message"></i> 5</h3>
            </div>

            <div class="overview-bottom">
                <span>Mensagens não lidas</span>
            </div>
        </aside>
    </article> <!-- Fim article overview -->


    <article id="mensagens-table">
        <h2>Últimas mensagens</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor) 
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('messages.show', ['message' => $visitor->message_id]) }}">
                                {{ $visitor->nome }}
                            </a>
                        </td>
                        <td>{{ $visitor->tel }}</td>
                        <td>{{ $visitor->email }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" id="foot-header">Total</th>
                    <td>{{ Visitor::count() }}</td>
                </tr>
            </tfoot>
        </table>
    </article>
</section>
@endsection