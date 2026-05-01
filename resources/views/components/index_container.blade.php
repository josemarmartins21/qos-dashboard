@props(['header_index' => ''])

<div class="index">
    <div id="index-header">
        {{ $header_index }}
    </div>

    <div id="cards">
        {{ $container_cards }}
    </div>
    {{ $slot }}
</div>