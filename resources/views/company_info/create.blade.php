@extends('layouts.app')
@use('App\enums\company_infos\CompanyInfoEnum')
@use('App\Models\CompanyInfo')
@section('title', 'Adicionar Informção da Empresa')

@section('content')
<div id="form-container">
    <x-alert /> 
        <x-form-container>
            <x-slot:title>Nova Informação da Empresa</x-slot>
            @if (! isset($type))
                <div id="btn-container">
                        <a href="{{ route('company_infos.create_with_image', ['type' => 'image']) }}" class="mais-informacao">

                            <i class="fa-solid fa-image"></i> Adicionar Logotipo / Banner
                        </a>
                </div>
            @endif
            <form action="{{ route('company_infos.store') }}" method="post" enctype="multipart/form-data">
                
                @csrf

                <div class="form-group">
                    <label for="key">Informação</label>

                    <select name="key" id="key">
                        <option value="" selected>Selecione uma informação</option>

                        @foreach (CompanyInfoEnum::cases() as $info)
                            @if (
                                isset($type) AND ($info->value === CompanyInfoEnum::logotipo->value || $info->value === CompanyInfoEnum::HeroImage->value)
                            )
                                <option @disabled(CompanyInfo::where('key', $info->value)->exists())  value="{{ $info->value }}"  @selected(old('key') == $info->value)>
                                        {{ $info->value }}
                                </option>
                                @continue
                            @endif

                            @if (
                                ! isset($type) AND ($info->value !== CompanyInfoEnum::logotipo->value && $info->value !== CompanyInfoEnum::HeroImage->value)
                            )
                                <option  @disabled(CompanyInfo::where('key', $info->value)->exists()) value="{{ $info->value }}" @selected(old('key') == $info->value )>
                                        {{ $info->value }}
                                </option>
                                @continue
                            @endif
                        @endforeach
                    </select>
                    <x-input-error-dashboard :message="$errors->first('key')" />
                </div>

                @if (isset($type))
                    <div class="form-group">
                        <input type="file" name="value" id="value" value="{{ old('value') }}">
                        <x-input-error-dashboard :message="$errors->first('value')" />
                    </div>
                @else
                    <div class="form-group">
                        <label for="value">Valor da Informação</label>
                        <textarea name="value" id="value" cols="30" rows="3" autofocus>
                            {{ old('value') }}
                        </textarea>
                        <x-input-error-dashboard :message="$errors->first('value')" />
                    </div>
                @endif

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection