@extends('layouts.app')

@section('title', 'Adicionar Assunto')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Novo Assunto</x-slot>

            <form action="{{ route('subjects.store') }}" method="post">
                
                @csrf

                <div class="form-group">
                    <label for="subject">Assunto</label>
                    <input type="text" name="subject" id="subject" placeholder="Digite o assunto" value="{{ old('subject') }}">
                    <x-input-error-dashboard :messages="$errors->get('subject')" />
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection