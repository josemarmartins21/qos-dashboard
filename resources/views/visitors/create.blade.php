@extends('layouts.app')

@section('title', 'Adicionar Pergunta Frequente')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Nova Pergunta Frequente</x-slot>

            <form action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
                
                @csrf

                <div class="form-group">
                    <label for="question">Pergunta</label>
                    <input type="text" name="question" id="question" placeholder="Digite a pergunta" autofocus>
                </div>

                <div class="form-group">
                    <label for="response">Resposta</label>
                    <textarea name="response" id="response" cols="30" rows="10">
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label for="is_active">Estado</label>
                    <select name="is_active" id="is_active">
                        <option value="" select>Selecione o estado</option>
                        <option value="1" select>Activado</option>
                        <option value="0" select>Desactivado</option>
                    </select>
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection