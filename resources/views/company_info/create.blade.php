@extends('layouts.app')

@section('title', 'Adicionar Assunto')
    
@section('content')
    <div id="form-container">
        <x-alert />
        <x-form-container>
            <x-slot:title>Nova Informação da Empresa</x-slot>

            <form action="{{ route('company_infos.store') }}" method="post">
                
                @csrf

                <div class="form-group">
                    <label for="key">Informação</label>
                    <input type="text" name="key" id="key" placeholder="Digite a informação" value="{{ old('key') }}">
                </div>

                <div class="form-group">
                    <label for="value">Valor da Informação</label>
                    <textarea name="value" id="value" cols="30" rows="3">
                        {{ old('value') }}
                    </textarea>
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection