<?php
$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix'=>'api/1.0.0/', 'middleware' => 'BasicAuth', 'namespace' => 'App\Http\Controllers'], function($router) {

        $router->group(['prefix' => 'bookingPal'], function () use ($router) {

            $router->get('location/getlocations/{term}', ['uses' => 'BookingPalController@getLocationsByTerm']);

            $router->get('locations/getinfo/{location}', ['uses' => 'BookingPalController@getLocationsGetInfo']);

            $router->get('type/{type}', ['uses' => 'BookingPalController@getAllProducts']);

            $router->get('{productId}/property/details', ['uses' => 'BookingPalController@getPropertyDetails']);

            $router->get('{productId}/propertysummary', ['uses' => 'BookingPalController@getPropertySummary']);

            $router->get('{productId}/quote/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getQuote']);

            $router->get('{productId}/prices/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getPrices']);

            $router->get('{productId}/availability/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@getAvailability']);

            $router->post('createBooking', ['uses' => 'BookingPalController@createBooking']);

        });

        $router->group(['prefix' => 'redAwning'], function () use ($router) {

            $router->get('listings/type/api/limit/{limit}/offset/{offset}', ['uses' => 'RedAwningController@getListingsFromAPI']);

            $router->get('listings', ['uses' => 'RedAwningController@getTriggerListingsImport']);

            $router->get('changes', ['uses' => 'RedAwningController@getTriggerChangesImport']);

            $router->get('quote/{listingId}/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'RedAwningController@getQuote']); //tested

            $router->get('listings/{listingId}', ['uses' => 'RedAwningController@getListingById']); //tested

            $router->get('listings/{listingId}/status', ['uses' => 'RedAwningController@getListingStatus']); //tested

            $router->get('listings/{listingId}/availability', ['uses' => 'RedAwningController@getListingAvailability']); //tested

            $router->get('listings/{listingId}/cico', ['uses' => 'RedAwningController@getListingCico']); //tested

            $router->get('listings/{listingId}/cicotimes', ['uses' => 'RedAwningController@getListingCicoTimes']); //tested

            $router->get('listings/{listingId}/content', ['uses' => 'RedAwningController@getListingContent']); //tested

            $router->get('listing-summaries', ['uses' => 'RedAwningController@getListingSummaries']);

            $router->get('listings/{listingId}/policies', ['uses' => 'RedAwningController@getListingPolicies']); //tested

            $router->get('listings/{listingId}/price', ['uses' => 'RedAwningController@getListingPrice']); //tested

            $router->post('reservations', ['uses' => 'RedAwningController@getNewReservation']);

            $router->get('reservations', ['uses' => 'RedAwningController@getReservations']);

            $router->get('reservation/{reservationId}', ['uses' => 'RedAwningController@getReservationById']);

            $router->delete('reservation/{reservationId}/delete', ['uses' => 'RedAwningController@deleteReservationById']);

            $router->get('reservation/{reservationId}/status', ['uses' => 'RedAwningController@getReservationStatus']);


        });
});