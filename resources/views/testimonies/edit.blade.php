@extends('layouts.app')

@section('title', 'Editar depoimento')
    
@section('content')
    <div id="form-container">
        <x-form-container>
            <x-slot:title>Editar Depoimento</x-slot>

            <form action="{{ route('testimonies.update', ['testimony' => $testimony->id]) }}" method="post">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <select name="client_id" id="client_id">
                        <option value=""  selected>Selecione o Cliente</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client['id'] }}" {{ $testimony->client_id ? 'selected' : '' }}>
                                {{ $client['name'] }} 
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="7">
                        {{ old('testimony', $testimony->testimony) }}
                    </textarea>
                </div>

                <input type="submit" value="Atualizar" class="btn-primary">
            </form>
        </x-form-container>  
    </div>
@endsection