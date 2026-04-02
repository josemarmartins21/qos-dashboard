@extends('layouts.app')

@section('title', 'Editar Cliente Renomado')
    
@section('content')
<div id="form-container">
    <x-alert />
        <x-form-container>
            <x-slot:title>Cliente - {{ $clientProveSocial->client->name }} </x-slot>

            <form action="{{ route('client_prove_socials.update', ['client_prove_social' => $clientProveSocial->id]) }}" method="post" enctype="multipart/form-data">
                
                @csrf

                @method('PUT')

                {{-- Image Preview --}}
                <div class="image-preview">
                    <img 
                    src="{{ '/images/logos_client/' . $clientProveSocial->logo }}" 
                    alt="{{ $clientProveSocial->logo }}" >
                </div>
                
                {{-- ID do cliente --}}
                <input type="hidden" name="client_id" value="{{ $clientProveSocial->client->id }}">

                {{-- Dr. da Empresa --}}
                <div class="form-group">
                    <label for="name">Dr. da Empresa</label>
                    <input type="text" name="name" id="name" placeholder="Digite o nome do cliente" value="{{ old('name',$clientProveSocial->client->name) }}">
                </div>

                {{-- Nome da Empresa --}}
                <div class="form-group">
                    <label for="company_role">Empresa</label>
                    <input type="text" name="company_role" id="company_role" placeholder="Digite o nome da empresa" value="{{ old('company_role',$clientProveSocial->client->company_role) }}">
                </div>

                {{-- Link da Página Ou Site da Empresa --}}
                <div class="form-group">
                    <label for="url">Link do site ou da página da empresa</label>
                    <input type="text" name="url" id="url" placeholder="https://......" value="{{ old('url',$clientProveSocial->url) }}">
                </div>

                {{-- Imagem do Logotipo da Empresa --}}
                <div class="form-group">
                    <label for="image">Site ou página da empresa</label>
                    <input type="file" name="image" id="image" value="{{ old('logo', $clientProveSocial->logo) }}">
                </div>
                
                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection