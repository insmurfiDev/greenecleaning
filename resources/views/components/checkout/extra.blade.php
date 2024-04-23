@props(['title', 'id', 'price', 'selected' => false])

<div class="col">
    <div data-extra data-id="{{$id}}" data-price="{{$price}}" class="page-checkout__form-extras__item {{ $selected ? 'page-checkout__form-extras__item-selected' : '' }} ">
        <div class="page-checkout__form-extras__item-icon-wrapper">{{ $icon }}</div>
        <div class="page-checkout__form-extras__item-center">
            <p class="page-checkout__form-extras__item-title">{{ $title }}</p>
            <p class="page-checkout__form-extras__item-price">${{ $price }}</p>
        </div>
        <x-icons.plus class="page-checkout__form-extras__item-plus" />
    </div>
</div>
