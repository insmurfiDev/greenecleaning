@props(['locations' => [], 'flatSizes' => [], 'bathroomSizes' => [], 'cleaningPrice' => 1000])

<div class="home-page__first-block" style="background-image: url({{ asset('img/intro/intro3.png') }})">
    <div class="home-page__first-block__inner container">
        <x-home.book :locations="$locations" :flatSizes="$flatSizes" :bathroomSizes="$bathroomSizes" :cleaningPrice="$cleaningPrice" />
        <div>
            <h2 class="home-page__first-block-title">Best Cleaning<br> Services And <br>Products.</h2>
            <h4 class="home-page__first-block-subtitle">Plant-based, high quality<br> and FDA approved.</h4>
        </div>
    </div>
</div>
