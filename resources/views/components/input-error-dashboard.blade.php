@props(['message'])

@if ($message)
    <ul>
        <li class="error-message">{{ $message }}</li>
    </ul>
@endif
