@extends('layouts.app')

@section('title', 'Adicionar Pergunta Frequente')
    
@section('content')
    <div id="form-container">
        <x-alert />
        <x-form-container>
            <x-slot:title>Nova Pergunta Frequente</x-slot>

            <form action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
                
                @csrf

                <div class="form-group">
                    <label for="question">Pergunta</label>
                    <input type="text" name="question" id="question" value="{{ old('question') }}" placeholder="Digite a pergunta">
                </div>

                <div class="form-group">
                    <label for="response">Resposta</label>
                    <textarea name="response" id="response" cols="30" rows="10">
                        {{ old('response') }}
                    </textarea>
                </div>
                
                <div class="form-group">
                    <label for="is_active">Estado</label>
                    <select name="is_active" id="is_active">
                        <option value="" selected>Selecione o estado</option>
                        <option value="1" {{ old('is_active') == 1 ? 'selected': '' }}>
                            Activado
                        </option>
                        <option value="0"  {{ old('is_active') == 0 ? 'selected': '' }}>
                            Desactivado
                        </option>
                    </select>
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection