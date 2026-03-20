@extends('layouts.app')

@section('title', 'Criar depoimento')
    
@section('content')
    <div id="testimony-create">
        <x-form-container>
            <h2>Adicionar Depoimento</h2>

            <form action="" method="post">
                <div class="form-group">
                    <select name="full_name" id="">
                        <select name="" id=""></select>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_role">Cargo do Cliente</label>
                    <input type="text" name="company_role" id="company_role">
                </div>

                <div class="form-group">
                    <label for="company_role">Cargo do Cliente</label>
                    <input type="text" name="company_role" id="company_role">
                </div>

                <div class="form-group">
                    <label for="testimony">Depoimento</label>
                    <textarea name="testimony" id="testimony" cols="30" rows="10"></textarea>
                </div>

                <div class="form-grou">
                    <label for="is_active">Estado</label>
                    <select name="" id="">
                        <option value="" selected>Selecione um Estado</option>
                        <option value="">Activo</option>
                        <option value="">Desactivado</option>
                    </select>
                </div>
            </form>
        </x-form-container>   
    </div>
@endsection