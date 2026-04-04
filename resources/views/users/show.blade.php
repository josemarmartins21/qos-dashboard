@use('App\Helpers\DateHelper')
@extends('layouts.app')

@section('title', $user->name)
    
@section('content')
    <x-show-user-container>
        <x-alert />
        <div id="user-header">
            <div id="profile-info">
                <div id="profile-image-container">
                    <img src="{{ asset('imagens/profile.png') }}" alt="Imagem de Perfil Genérica">
                </div>

                <div id="infos">
                    <h2>{{ $user->name }}</h2>
                    <p>Nivel de Acesso: {{ $user->permissions->first()->name ?? 'Nenhum' }}</p>
                </div>
            </div>

            <div id="edit-action">
                <a href="{{ route('edit-password', ['user' => $user->id]) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Password
                </a>
            </div>
        </div>

        <div id="user-edit">
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

                {{-- Nível de Acesso --}}
                <div class="form-group">
                    <label for="level">Nível de Acesso</label>
                    <select name="level" id="level">
                        <option value="" selected>Selecione o nível de acesso</option>

                        @foreach ($levels as $level)
                            <option value="{{ $level->name }}">
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
            </x-form-container>  
        </div>
    </x-show-user-container>
@endsection