@extends('layouts.app')

@section('title', 'Adicionar depoimento')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Novo Depoimento</x-slot>

            <form action="{{ route('testimonies.store') }}" method="post">
                
                @csrf

                <div class="form-group">
                    <label for="name">Nome do Cliente *</label>
                    <input type="text" name="name" id="name" placeholder="Nome do cliente" value="{{ old('name') }}">
                    <x-input-error-dashboard :message="$errors->first('name')" />
                </div>
                
                <div class="form-group">
                    <label for="company_role">Cargo na Empresa *</label>
                    <input type="text" name="company_role" id="company_role" placeholder="Cargo na empresa" value="{{ old('company_role') }}">
                    <x-input-error-dashboard :message="$errors->first('company_role')" />
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento *</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="7">
                        {{ old('testimony') }}
                    </textarea>
                    <x-input-error-dashboard :message="$errors->first('testimony')" />
                </div>

                <div class="form-group">
                    <label for="is_active">Estado *</label>
                    <select name="is_active" id="is_active">
                        <option value="" selected >Selecione um Estado</option>
                        <option value="1" {{ old('is_active') === '1' ? 'selected' : '' }}>Activado</option>
                        <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>Desactivado</option>
                    </select>
                    <x-input-error-dashboard :message="$errors->first('is_active')" />
                </div>
                <input type="hidden" name="type" value="depoimento">

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection