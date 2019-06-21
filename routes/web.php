<?php
$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix'=>'api/1.0.0/'], function($router) {

        $router->group(['prefix' => 'bookingPal'], function () use ($router) {

            $router->get('locations/search/{term}', ['uses' => 'BookingPalController@searchLocations']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/search/related/{term}', ['uses' => 'BookingPalController@searchRelatedLocations']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/check/{term}', ['uses' => 'BookingPalController@locationsCheck']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{term}', ['uses' => 'BookingPalController@locationsAll']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{locationID}/prices/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@locationPrices']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{locationID}/quotes/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@locationQuote']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{type}/list', ['uses' => 'BookingPalController@listLocations']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{locationID}/room/info', ['uses' => 'BookingPalController@locationRoomInfo']); //DONE - TESTED - - ERROR!!!!! //todo fix this
            //[{"api_response":{"is_error":true,"message":"We can't process your request at this moment. Please contact BookingPal technical support by email at support@mybookingpal.com, or by phone at 1-949-333-0724 option #2. Thank You","messageCode":"runtime"}}].

            $router->get('units/{locationID}/policies/channel', ['uses' => 'BookingPalController@locationPolicies']); //DONE - TESTED - ERROR!!!!! //todo fix this
            // [{"api_response":{"is_error":true,"message":"User not found.","messageCode":""}}]

            $router->get('property/details/{locationID}', ['uses' => 'BookingPalController@propertyDetails']); //DONE - TESTED - DOCUMENTED

            $router->post('booking/create', ['uses' => 'BookingPalController@bookProperty']); //DONE - TESTED - DOCUMENTED

            $router->get('booking/{reservationID}/reason/{reason}/amount/{amount}/cancel', ['uses' => 'BookingPalController@cancelProperty']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{locationID}/availability/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@availabilityCalendar']); //DONE - TESTED - DOCUMENTED

            $router->get('locations/{locationID}/reservation/prices/from_date/{fromDate}/to_date/{toDate}', ['uses' => 'BookingPalController@reservationPrices']); //DONE - TESTED - DOCUMENTED



//            $router->get('{productId}/propertysummary', ['uses' => 'BookingPalController@getPropertySummary']);


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