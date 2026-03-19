@extends('layouts.app')

@section('title', 'Home')


@section('content')
    <section id="ficha">
            <img src="{{ asset('imagens/guanabara-perfil.jpg') }}" alt="Josemar Martins" class="foto">
            <h1>Josemar Martins</h1>
            <div id="social">
               <ul>
                    <li><a href="#"> Home <i class="fa-solid fa-house"></i></a></li>
                    <li><a href="#">Dashboard <i class="fa-solid fa-grip"></i></a></li>
                    <li><a href="#">Depoimentos <i class="fa-brands fa-stack-exchange"></i></a></li>
                    <li><a href="#">Perguntas Frequentes <i class="fa-solid fa-file-circle-question"></i></a></li>
                    <li><a href="#">Clientes renomados <h3><i class="fa-solid fa-people-roof"></i> 5</h3></a></li>
                    <li><a href="#">Mensagens <i class="fa-solid fa-message"></i></a></li>
                </ul>
            </div>
        </section>

        <section id="principal">
            <h2>Resumo Rápido</h2>
            <article id="overview-container">
                <aside class="overview">
                    <div class="overview-top">
                        <h3><i class="fa-solid fa-people-roof"></i> 5</h3>
                    </div>

                    <div class="overview-bottom">
                        <span>Total de clientes renomado</span>
                    </div>
                </aside>
                <aside class="overview">
                    <div class="overview-top">
                        <h3><i class="fa-brands fa-stack-exchange"></i> 5</h3>
                    </div>

                    <div class="overview-bottom">
                        <span>Total de depoimentos</span>
                    </div>
                </aside>
                <aside class="overview">
                    <div class="overview-top">
                         <h3><i class="fa-solid fa-file-circle-question"></i> 5</h3>
                    </div>

                    <div class="overview-bottom">
                        <span>Total de FAQ</span>
                    </div>
                </aside>
                <aside class="overview">
                    <div class="overview-top">
                        <h3> <i class="fa-solid fa-message"></i> 5</h3>
                    </div>

                    <div class="overview-bottom">
                        <span>Mensagens não lidas </span>
                    </div>
                </aside>
            </article> <!-- Fim article overview -->


            <article id="mensagens-table">
                <h2>Últimas mensagens</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Problema</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Josimar Martins</td>
                            <td>930 710 346</td>
                            <td>Internet em Baixo</td>
                            <td>Pendente</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" id="foot-header">Total</th>
                            <td>12</td>
                        </tr>
                    </tfoot>
                </table>
            </article> <!-- Fim article skills -->
        </section>
@endsection