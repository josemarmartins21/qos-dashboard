@extends('layouts.app')

@section('title', 'Adicionar depoimento')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Novo Depoimento</x-slot>

            <form action="{{ route('testimonies.store') }}" method="post">
                
                @csrf

                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <select name="client_id" id="client_id">
                        <option value=""  selected>Selecione o Cliente</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client['id'] }}"> {{ $client['name'] }} </option>
                        @endforeach
                    </select>
                    <x-input-error-dashboard :messages="$errors->get('client_id')" />
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="7">
                        {{ old('testimony') }}
                    </textarea>
                    <x-input-error-dashboard :messages="$errors->get('testimony')" />
                </div>

                <div class="form-group">
                    <label for="is_active">Estado</label>
                    <select name="is_active" id="is_active">
                        <option value="" selected>Selecione um Estado</option>
                        <option value="1">Activado</option>
                        <option value="0">Desactivado</option>
                    </select>
                    <x-input-error-dashboard :messages="$errors->get('is_active')" />
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection