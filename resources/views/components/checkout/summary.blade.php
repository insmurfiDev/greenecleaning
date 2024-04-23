<div class="page-checkout__summary">
    <h2 class="page-checkout__summary-title">Your Order Summary</h2>
    <div class="page-checkout__summary-positions">
        <x-checkout.position title="Flat type" id="flatTypeSelected" />
        <x-checkout.position title="Bathroom type" id="bathroomTypeSelected" />
        <x-checkout.position title="Cleaning type" id="cleaningTypeSelected" />
        <x-checkout.position title="Extras" id="extrasList" />
    </div>
    <div class="page-checkout__summary-check">
        <p class="page-checkout__summary-check-title">APPOINTMENT VALUE</p>
        <div class="page-checkout__summary-check__items">
            <div class="page-checkout__summary-check__items-item">
                <p>Value</p>
                <b data-summary-value>79.00</b>
            </div>
            <div class="page-checkout__summary-check__items-item">
                <p>Tax</p>
                <b data-summary-tax>1.00</b>
            </div>
        </div>
        <div class="page-checkout__summary-check__total">
            <p>Total</p>
            <b data-summary-total>$80.00</b>
        </div>
    </div>
</div>
