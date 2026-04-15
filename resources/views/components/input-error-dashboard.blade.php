@props(['messages'])

@if ($messages)
    <ul>
        @foreach ((array) $messages as $message)
            <li class="error-message">{{ $message }}</li>
        @endforeach
    </ul>
@endif
