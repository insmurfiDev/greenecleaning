<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('faq', 'FaqCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('review', 'ReviewCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('shipping', 'ShippingCrudController');
    Route::crud('coupon', 'CouponCrudController');
    Route::crud('tax', 'TaxCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('location', 'LocationCrudController');
    Route::crud('flat_size', 'FlatSizeCrudController');
    Route::crud('cleaning_type', 'CleaningTypeCrudController');
    Route::crud('bathroom_size', 'BathroomSizeCrudController');
    Route::crud('extras', 'ExtrasCrudController');
    Route::crud('time_window', 'TimeWindowCrudController');
    Route::crud('cleaning', 'CleaningCrudController');
}); // this should be the absolute last line of this file