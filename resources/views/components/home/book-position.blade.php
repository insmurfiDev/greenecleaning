@props([
    'title' => '',
])

<div {{ $attributes->merge(['class' => 'home-page__first-block__book-positions__position']) }}>
    <div class="home-page__first-block__book-positions__position__left">
        <x-icons.minus />
    </div>
    <div class="home-page__first-block__book-positions__position-title">{{ $title }}</div>
    <div class="home-page__first-block__book-positions__position__right">
        <x-icons.plus />
    </div>
</div>
