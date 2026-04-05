@extends('layouts.app')

@section('title', 'Editar ' . $companyInfo->key)
    
@section('content')
<div id="form-container">
    <x-alert />
        <x-form-container>
            <x-slot:title>Editar Informação de {{ $companyInfo->key }} </x-slot>

            <form action="{{ route('company_infos.update', ['company_info' => $companyInfo->id]) }}" method="post">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="key">Informação</label>
                    <input type="text" name="key" id="key" placeholder="Digite a informação" value="{{ old('key', $companyInfo->key) }}">
                </div>

                <div class="form-group">
                    <label for="value">Valor da Informação</label>
                    <textarea name="value" id="value" cols="30" rows="3">
                        {{ old('value', $companyInfo->value) }}
                    </textarea>
                </div>

                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection