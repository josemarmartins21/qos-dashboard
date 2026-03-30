@extends('layouts.app')

@section('title', 'Mensagem de ' . $message->visitor->full_name)
    
@section('content')
    <x-show_container>

    </x-show_container>
@endsection