@use('App\Helpers\DateHelper')
@use('Illuminate\Support\Facades\Auth')


@extends('layouts.app')



@section('title', ucwords($user->name))

@section('content')
    <x-show-user-container>
        <div id="user-header">
            <div id="profile-info">
                <div id="profile-image-container">
                    <img src="{{ asset('images/users/' . $user->image) }}" alt="{{ $user->name }}">
                </div>

                <div id="infos">
                    <h2>{{ $user->name }}</h2>
                    <p>Nivel de Acesso: {{ $user->permission()->first()->name}}</p>
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
            <x-slot:title>{{ ucwords($user->name) }}</x-slot>

            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                
                @csrf

                @method('PUT')

                {{-- Nome --}}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Digite o nome do cliente" value="{{ old('name', $user->name) }}">
                </div>
                <x-input-error-dashboard :message="$errors->get('name')" />
                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite o nome da empresa" value="{{ old('email',$user->email) }}">
                </div>
                <x-input-error-dashboard :message="$errors->get('email')" />
                {{-- Nível de Acesso --}}
                <div class="form-group">
                    <label for="level">Nível de Acesso</label>
                    <select name="level" id="level">
                        <option value="" selected>Selecione o nível de acesso</option>

                        @foreach ($levels as $level)
                            <option @disabled(
                                ! Auth::user()->hasPermission('super-admin'))
                                value="{{ $level->name }}"  
                                {{ $user->permission()->first()->name == $level->name ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <x-input-error-dashboard :message="$errors->get('level')" />
                <input type="submit" value="Atualizar" class="btn-primary" autofocus> 
            </form>
            </x-form-container>  
        </div>
    </x-show-user-container>
@endsection