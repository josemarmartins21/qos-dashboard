@extends('layouts.app')

@section('title', 'Editar Pergunta')
    
@section('content')
<div id="form-container">
    <x-alert />
        <x-form-container>
            <x-slot:title>Editar Pergunta</x-slot>

            <form action="{{ route('questions.update', ['question' => $question->id]) }}" method="post" enctype="multipart/form-data">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="question">Pergunta</label>
                    <input type="text" name="question" id="question" placeholder="Digite a pergunta" value="{{ old('question', $question->question) }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="response">Resposta</label>
                    <textarea name="response" id="response" cols="30" rows="10">
                        {{ old('response', $question->response) }}
                    </textarea>
                </div>

                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection