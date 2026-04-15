@extends('layouts.app')
@use('App\enums\company_infos\CompanyInfoEnum')
@section('title', 'Editar ' . $companyInfo->key)

@section('content')
<div id="form-container">
        <x-form-container>
            <x-slot:title>Editar {{ $companyInfo->key }} </x-slot>
            @if (
                $companyInfo->key === CompanyInfoEnum::Logotipo->value 
                    || $companyInfo->key === CompanyInfoEnum::HeroImage->value
                )
                    <img src="{{ asset('images/company_images/' . $companyInfo['value']) }}" alt="{{ $companyInfo['key'] }}" width="110px" class="image-company">
            @endif
            <form action="{{ route('company_infos.update', ['company_info' => $companyInfo->id]) }}" method="post" enctype="multipart/form-data">
                
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="key">Informação</label>


                    <select name="" id="" @disabled(true)>
                        <option value="" selected>Selecione uma opção</option>
                        @foreach ($company_infos as $info)
                            <option value="" {{ old('key', $companyInfo->key) == $info->key ? 'selected' : '' }}>
                                {{ $info->key }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="key" value="{{ $companyInfo->key }}">
                </div>

                @if (
                $companyInfo->key === CompanyInfoEnum::Logotipo->value 
                    || $companyInfo->key === CompanyInfoEnum::HeroImage->value
                )
                    <div class="form-group">
                        <label for="value">Valor da Informação</label>
                        <input type="file" name="value" id="value" value="{{ old('value', $companyInfo->key) }}">
                        <x-input-error-dashboard :messages="$errors->get('value')" />
                    </div>
                    
                @elseif ($companyInfo->key === CompanyInfoEnum::Sobre->value )
                    <div class="form-group">
                        <label for="value">Valor da Informação</label>
                        <textarea name="value" id="value" cols="30" rows="3">
                            {{ old('value', $companyInfo->value) }}
                        </textarea>
                        <x-input-error-dashboard :messages="$errors->get('value')" />
                    </div>
                @else
                    <div class="form-group">
                        <label for="value">Valor da Informação</label>
                        <input type="text" name="value" id="value" value="{{ old('value', $companyInfo->value) }}" placeholder="Digite o {{ $companyInfo->key }}">
                        <x-input-error-dashboard :messages="$errors->get('value')" />
                    </div>
                @endif

                <input type="submit" value="Atualizar" class="btn-primary"> 
            </form>
        </x-form-container>  
</div>
@endsection