@extends('web_page.layouts.app')

@section('content')
<x-alert />
<section id="contactos">
    <div id="contactos-container">
        <div id="disclaimer-suporte">
            <img src="{{ asset('imagens/perguntado.png') }}" alt="Pessoa sendo respondida">
        </div>
        <form action="{{ route('visitors.store') }}" method="POST" id="form-suporte">
            @csrf


            <h1>Deixa-nos Saber a Sua <span>Dúvida</span></h1>

            <div class="form-group">
                <label for="full_name">Nome Completo *</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">
                <x-input-error-dashboard :messages="$errors->get('full_name')" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"  value="{{ old('email') }}">
                <x-input-error-dashboard :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <label for="phone">Telefone *</label>
                <input type="phone" id="phone" name="phone" value="{{ old('phone') }}">
                <x-input-error-dashboard :messages="$errors->get('phone')" />
            </div>

            <div class="form-group">
                <label for="subject_id">Selecione o tipo de problema</label>
                <select name="subject_id" id="subject_id">
                    <option value="" selected>Em que podemos ajudar-lo?</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') ? 'selected' : ''}}>{{ $subject->subject }}</option>
                    @endforeach
                </select>
                <x-input-error-dashboard :messages="$errors->get('subject_id')" />
            </div>

            <div class="form-group">
                <label for="body">Mensagem *</label>
                <textarea id="body" name="body" rows="5">
                    {{ old('body') }}
                </textarea>
                <x-input-error-dashboard :messages="$errors->get('body')" />
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>
</section>
@endsection