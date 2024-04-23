@props(['locations' => [], 'flatSizes' => [], 'bathroomSizes' => [], 'cleaningPrice'])

<input hidden id="flatSizesJson" value="{{json_encode($flatSizes)}}" />
<input hidden id="bathroomSizesJson" value="{{json_encode($bathroomSizes)}}" />
<input hidden id="cleaningPrice" value="{{$cleaningPrice}}" />
<input hidden id="locations" value="{{$locations}}" />

<div class="home-page__first-block__book">
    <h3 class="home-page__first-block__book-title">
        Reserve Green Cleaning now
    </h3>
    <div class="home-page__first-block__book-positions">
        <div class="home-page__first-block__book-positions__position">
            <div class="home-page__first-block__book-positions__position__left">
                <x-icons.map-dot />
            </div>
            <x-controls.select class="home-page__first-block__book-positions__position-title" key="locations"
                :options="$locations->map(function ($locations) {
                    return [
                        'name' => $locations['name'],
                        'value' => $locations['id'],
                    ];
                })" />
            <div class="home-page__first-block__book-positions__position__right">
                <x-icons.down />
            </div>
        </div>
        <x-home.book-position data-position-flat title="{{$flatSizes[0]->size}}" />
        <x-home.book-position data-position-bathroom title="{{$bathroomSizes[0]->size}}" />
    </div>
    <div class="home-page__first-block__pay">
        <div class="home-page__first-block__pay-total">
            <span>Total:</span>
            <b data-book-price ></b>
        </div>
        <a class="home-page__first-block__pay-btn btn-default" data-href="{{route('booking')}}" href="{{route('booking')}}" >
            Book now
        </a>
    </div>
    <div class="home-page__first-block__bottom-separator">
        <p class="home-page__first-block__bottom-separator-text">or shop and DIY</p>
        <div class="home-page__first-block__bottom-separator-line"></div>
    </div>
    <a class="home-page__first-block__bottom-products-link btn-default" href="{{route('products')}}" >Our products</a>
</div>
