@extends('layouts.app')

@section('title', 'Editar Pergunta')
    
@section('content')
<div id="form-container">
        <x-form-container>
            <x-slot:title>Editar Pergunta</x-slot>

            <form action="{{ route('questions.update', ['question' => $question->id]) }}" method="post">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="question">Pergunta</label>
                    <input type="text" name="question" id="question" placeholder="Digite a pergunta" value="{{ old('question', $question->question) }}">
                    <x-input-error-dashboard :message="$errors->first('question')" />
                </div>

                <div class="form-group">
                    <label for="response">Resposta</label>
                    <textarea name="response" id="response" cols="30" rows="10">
                        {{ old('response', $question->response) }}
                    </textarea>
                    <x-input-error-dashboard :message="$errors->first('response')" />
                </div>

                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection