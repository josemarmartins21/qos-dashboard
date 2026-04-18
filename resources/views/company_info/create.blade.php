@extends('layouts.app')
@use('App\enums\company_infos\CompanyInfoEnum')

@section('title', 'Adicionar Assunto')
    
@section('content')
    <div id="form-container">
        <x-alert />
        <x-form-container>
            <x-slot:title>Nova Informação da Empresa</x-slot>
            @if (! isset($type))
                <div id="btn-container">
                        <a href="{{ route('company_infos.create_with_image', ['type' => 'image']) }}" class="mais-informacao">

                            <i class="fa-solid fa-image"></i> Adicionar Logo ou Hero
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
                                <option value="{{ $info->value }}" {{ old('key') == $info->value ? 'selected' : '' }}>
                                        {{ $info->value }}
                                </option>
                                @continue
                            @endif

                            @if (
                                ! isset($type) AND ($info->value !== CompanyInfoEnum::logotipo->value && $info->value !== CompanyInfoEnum::HeroImage->value)
                            )
                                <option value="{{ $info->value }}" {{ old('key') == $info->value ? 'selected' : '' }}>
                                        {{ $info->value }}
                                </option>
                                @continue
                            @endif
                        @endforeach
                       {{--  @if (isset($type)) 

                            @foreach (CompanyInfoEnum::cases() as $info)
                                @if (
                                    $info->value !== CompanyInfoEnum::logotipo->value || $info->value !== CompanyInfoEnum::HeroImage->value
                                )
                                    @continue
                                @endif

                                    <option value="{{ $info->value }}" {{ old('key') == $info->value ? 'selected' : '' }}>
                                        {{ $info->value }}
                                    </option>
                                    
                            @endforeach
                            
                        @else
                            @foreach (CompanyInfoEnum::cases() as $info)
                                @if (
                                    $info->value === CompanyInfoEnum::logotipo->value || $info->value === CompanyInfoEnum::HeroImage->value
                                )    
                                    @continue
                                @endif

                                <option value="{{ $info->value }}" {{ old('key') == $info->value ? 'selected' : '' }}>
                                    {{ $info->value }}
                                </option>
                            @endforeach
                        @endif --}}
                    </select>
                </div>

                @if (isset($type))
                    <div class="form-group">
                        <input type="file" name="value" id="value" value="{{ old('value') }}">
                    </div>
                @else
                    <div class="form-group">
                        <label for="value">Valor da Informação</label>
                        <textarea name="value" id="value" cols="30" rows="3">
                            {{ old('value') }}
                        </textarea>
                    </div>
                @endif

                <input type="submit" value="Adicionar" class="btn-primary">
            </form>
        </x-form-container>   
    </div>
@endsection