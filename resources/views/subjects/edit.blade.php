@extends('layouts.app')

@section('title', 'Editar Assunto')
    
@section('content')
<div id="form-container">
        <x-form-container>
            <x-slot:title>Editar Assunto</x-slot>

            <form action="{{ route('subjects.update', ['subject' => $subject['id']]) }}" method="post">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="subject">Assunto</label>
                    <input type="text" name="subject" id="subject" placeholder="Digite o assunto" value="{{ old('subject', $subject['subject']) }}" autofocus>
                    <x-input-error-dashboard :message="$errors->first('subject')" />
                </div>

                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection