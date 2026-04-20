@extends('layouts.app')

@section('title', 'Editar depoimento')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Editar Depoimento</x-slot>

            <form action="{{ route('testimonies.update', ['testimony' => $testimony->id]) }}" method="post">
                
                @csrf

                @method('PUT')

                <input type="hidden" name="client_id" value="{{ $testimony->client_id }}">

                <div class="form-group">
                    <label for="name">Nome do Cliente *</label>
                    <input type="text" name="name" id="name" placeholder="Nome do cliente" value="{{ old('name', $testimony->nome) }}">
                    <x-input-error-dashboard :message="$errors->first('name')" />
                </div>

                <div class="form-group">
                    <label for="company_role">Cargo na Empresa *</label>
                    <input type="text" name="company_role" id="company_role" placeholder="Cargo na empresa" value="{{ old('company_role', $testimony->cargo) }}">
                    <x-input-error-dashboard :message="$errors->first('company_role')" />
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="7">
                        {{ old('testimony', $testimony->depoimento) }}
                    </textarea>
                    <x-input-error-dashboard :message="$errors->first('testimony')" />
                </div>

                <input type="submit" value="Atualizar" class="btn-primary">
            </form>
        </x-form-container>  
    </div>
@endsection