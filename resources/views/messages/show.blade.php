@use('App\Helpers\DateHelper')
@extends('layouts.app')

@section('title', 'Mensagem de ' . $message->visitor->full_name)
    
@section('content')
    <x-show_container>
        <div id="message-container">
            <h2>Lorem ipsum dolor sit amet.</h2>
            <div class="barra"></div>
            <p class="body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, inventore libero. Itaque excepturi inventore architecto eligendi enim provident illum, dolore ratione voluptatum eos iusto, vel reprehenderit hic soluta recusandae qui?
            </p>
            <div id="details">
                <p>
                    Enviada por {{ $message->visitor->full_name }} {{ DateHelper::diffForHumans($message->created_at) }}
                </p>
            </div>
        </div>
    </x-show_container>
@endsection