@props(['active_link' => false, 'name', 'icon' => ''])

<li >
    {{ $slot }}
    <a {{ $attributes }} @class(['active_link' => $active_link])> 
        {{ $name }} <i class="{{ $icon }}"></i>
    </a>
</li>