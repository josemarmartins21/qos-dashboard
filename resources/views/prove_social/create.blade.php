@extends('layouts.app')

@section('title', 'Adicionar Cliente Renomado')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Novo Cliente Renomado</x-slot>

            <form action="{{ route('client_prove_socials.store') }}" method="post" enctype="multipart/form-data">
                
                @csrf

                {{-- Dr. da Empresa --}}
                <div class="form-group">
                    <label for="name">Dr. da Empresa *</label>
                    <input type="text" name="name" id="name" placeholder="Digite o nome do cliente" value="{{ old('name') }}" autofocus>
                    <x-input-error-dashboard :message="$errors->first('name')" />
                </div>

                {{-- Nome da Empresa --}}
                <div class="form-group">
                    <label for="company_role">Empresa *</label>
                    <input type="text" name="company_role" id="company_role" placeholder="Digite o nome da empresa" value="{{ old('company_role') }}">
                    <x-input-error-dashboard :message="$errors->first('company_role')" />

                </div>

                <input type="hidden" name="type" value="cliente renomado">

                {{-- Link da Página Ou Site da Empresa --}}
                <div class="form-group">
                    <label for="testimony">Link do site ou da página da empresa *</label>
                    <input type="text" name="url" id="url" placeholder="htttps:\\....." value="{{ old('url') }}">
                    <x-input-error-dashboard :message="$errors->first('url')" />
                </div>

                {{-- Imagem do Logotipo da Empresa --}}
                <div class="form-group">
                    <label for="image">Logo da empresa *</label>
                    <input type="file" name="image" id="image" value="{{ old('image') }}">
                    <x-input-error-dashboard :message="$errors->first('image')" />
                </div>
                
                <div class="form-group">
                    <label for="is_active">Estado *</label>
                    <select name="is_active" id="is_active">
                        <option value="" selected>Selecione um Estado</option>
                        <option value="1">Activado</option>
                        <option value="0">Desactivado</option>
                    </select>
                    <x-input-error-dashboard :message="$errors->first('is_active')" />
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection