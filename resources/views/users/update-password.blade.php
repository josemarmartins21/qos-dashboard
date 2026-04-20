@extends('layouts.app')

@section('title', 'Atualizar Password | ' . $user->name)
    
@section('content')
<div id="form-container">
<x-alert />
        <x-form-container>
            <x-slot:title>Nova Palavra Pass</x-slot>

            <form action="{{ route('update-password', ['user' => $user->id]) }}" method="post">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="password">Palavra Pass</label>
                    <input type="password" name="password" id="password" placeholder="Nova palavra pass" value="{{ old('password') }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Palavra Pass</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme a nova palavra pass" value="{{ old('password_confirmation') }}">
                </div>

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection