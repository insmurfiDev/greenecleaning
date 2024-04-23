@props(['title' => ''])

<div class="page-services__products-list__product">
    <div class="page-services__products-list__product-icon-wrapper">{{ $icon }}</div>
    <h4 class="page-services__products-list__product-title">{{ $title }}</h4>
    <p class="page-services__products-list__product-description">
        {{ $slot }}
    </p>
    <a class="page-services__products-list__product-link btn-default">
        Book now
    </a>
</div>
