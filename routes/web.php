<?php
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'bookingPal/'], function () use ($router) {

    $router->get('type/{type}', ['uses' => 'BookingPalController@getAllProducts']);

    $router->get('name/{name}', ['uses' => 'BookingPalController@getProductIDByName']);

    $router->get('{productId}/property_details', ['uses' => 'BookingPalController@getPropertyDetails']);

    $router->get('{productId}/property_summary', ['uses' => 'BookingPalController@getPropertySummary']);

    $router->get('{productId}/prices/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getQuote']);

    $router->get('{productId}/quote/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getPrices']);

    $router->get('{productId}/availability/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getAvailability']);

    $router->post('createBooking', ['uses' => 'BookingPalController@createBooking']);

    });

    $router->group(['prefix' => 'redAwning'], function () use ($router) {

        $router->get('listings', ['uses' => 'RedAwningController@listings']);

        $router->get('changes', ['uses' => 'RedAwningController@changes']);

        $router->get('{listingId}/property_details', ['uses' => 'RedAwningController@displayListing']);

        $router->get('{listingId}/quote/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'RedAwningController@getQuote']);

        $router->post('reservation/{quoteId}', ['uses' => 'RedAwningController@newReservation']);

        $router->get('listings/{listingId}/status', ['uses' => 'RedAwningController@getListingStatus']);

        $router->get('listings/{listingId}/availability', ['uses' => 'RedAwningController@getListingAvailability']);

        $router->get('listings/{listingId}/cico', ['uses' => 'RedAwningController@getListingCico']);

        $router->get('listings/{listingId}/cicotimes', ['uses' => 'RedAwningController@getListingCicoTimes']);

        $router->get('listings/{listingId}/content', ['uses' => 'RedAwningController@getListingContent']);

        $router->get('listings/{listingId}', ['uses' => 'RedAwningController@getListing']);

        $router->get('listing-summaries', ['uses' => 'RedAwningController@getListingSummaries']);

        $router->get('listings/{listingId}/policies', ['uses' => 'RedAwningController@getListingPolicies']);

        $router->get('listings/{listingId}/price', ['uses' => 'RedAwningController@getListingPrice']);

        $router->get('reservations', ['uses' => 'RedAwningController@getReservations']);


    });
});