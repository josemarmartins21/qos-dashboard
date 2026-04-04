@extends('layouts.app')

@section('title', 'Editar Usuário')
    
@section('content')
<div id="form-container">
    <x-alert />
        <x-form-container>
            <x-slot:title>{{ $user->name }}</x-slot>

            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                
                @csrf

                @method('PUT')

                {{-- Nome --}}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Digite o nome do cliente" value="{{ old('name', $user->name) }}">
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite o nome da empresa" value="{{ old('email',$user->email) }}">
                </div>
                
                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection