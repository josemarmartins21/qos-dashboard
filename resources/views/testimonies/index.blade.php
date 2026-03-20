@extends('layouts.app')

@section('title', 'Depoimentos')
    
@section('content')
    <div id="testimonies-container">
        <h2>Depoimentos</h2>

        {{-- Form de pesquisa --}}
        <div id="testiomonies-index">
            <div id="testimony-header">
                <form action="" method="get">
                    <input type="search" name="" id="" placeholder="Digite o nome de um cl.....">
                </form>

                <div id="btn-container">
                    <a href="#" class="pdf-btn"><i class="fa-solid fa-file-pdf"></i> Gerar PDF</a>
                    <a href="{{ route('testimonies.create') }}" class="mais-depoimentos"><i class="fa-solid fa-plus"></i> Adicionar</a>
                </div>
            </div>

            {{-- Cards de depoimentos --}}
            <div id="testiomies">

                {{-- Card de depoimentos --}}
                <div class="testimony">
                    <div class="info-testimony">
                        <h3>Josimar Martins 1</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="btn-testimony">
                        <form action="" class="active">
                            <button type="submit"><i class="fa-solid fa-eye"></i></button>
                        </form>

                        <div class="actions-btn">
                            <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="" method="post">
                                <button class="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Fim do Card de depoimento --}}
                {{-- Card de depoimentos --}}
                <div class="testimony">
                    <div class="info-testimony">
                        <h3>Josimar Martins 1</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="btn-testimony">
                        <form action="" class="active">
                            <button type="submit"><i class="fa-solid fa-eye"></i></button>
                        </form>

                        <div class="actions-btn">
                            <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="" method="post">
                                <button class="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Fim do Card de depoimento --}}
                {{-- Card de depoimentos --}}
                <div class="testimony">
                    <div class="info-testimony">
                        <h3>Josimar Martins 1</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="btn-testimony">
                        <form action="" class="active">
                            <button type="submit"><i class="fa-solid fa-eye-slash"></i></button>
                        </form>

                        <div class="actions-btn">
                            <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="" method="post">
                                <button class="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Fim do Card de depoimento --}}
                {{-- Card de depoimentos --}}
                <div class="testimony">
                    <div class="info-testimony">
                        <h3>Josimar Martins 1</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>

                    <div class="btn-testimony">
                        <form action="" class="active">
                            <button type="submit"><i class="fa-solid fa-eye-slash"></i></button>
                        </form>

                        <div class="actions-btn">
                            <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="" method="post">
                                <button class="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Fim do Card de depoimento --}}
            </div>
        </div>
    </div>
@endsection