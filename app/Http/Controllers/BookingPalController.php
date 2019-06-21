<?php

namespace App\Http\Controllers;

use App\ResponseProvider;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

/**
 * Class BookingPalController
 * @package App\Http\Controllers
 */
class BookingPalController extends Controller
{
    private $ResponseServiceProvider;

    public function __construct()
    {
//        $this->middleware('BasicAuth');
        $this->ResponseServiceProvider = new ResponseProvider();
    }

    /**
     * Location Policies
     * @group BookingPal
     * @param $locationID
     * @queryParam LocationID required
     * @return ResponseProvider
     * @response [{"ID":"21980","label":"Paris, France","isLocationParent":false},{"ID":"176628","label":"Paris, ME, United States of America","isLocationParent":false},{"ID":"92650","label":"Paris\/17, France","isLocationParent":false},{"ID":"115148","label":"Parisot, France","isLocationParent":false}]
     */
    public function locationPolicies($locationID)
    {

        $pos = env('MyBookingPalPOS', true);
        $url = 'https://www.mybookingpal.com/xml/services/json/units/' . $locationID . '/policies-channel?pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Location Room Info
     * @group BookingPal
     * @param $locationID
     * @queryParam LocationID required
     * @return ResponseProvider
     * @response [{"ID":"21980","label":"Paris, France","isLocationParent":false},{"ID":"176628","label":"Paris, ME, United States of America","isLocationParent":false},{"ID":"92650","label":"Paris\/17, France","isLocationParent":false},{"ID":"115148","label":"Parisot, France","isLocationParent":false}]
     */
    public function locationRoomInfo($locationID)
    {

        $pos = env('MyBookingPalPOS', true);

        $url = 'https://demo.mybookingpal.com/xml/services/json/product/room-data?pos=' . $pos . '&product-id=' . $locationID;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * All Locations
     * @group BookingPal
     * @param $term
     * @queryParam Search Term required
     * @return ResponseProvider
     * @response [{"ID":"21980","label":"Paris, France","isLocationParent":false},{"ID":"176628","label":"Paris, ME, United States of America","isLocationParent":false},{"ID":"92650","label":"Paris\/17, France","isLocationParent":false},{"ID":"115148","label":"Parisot, France","isLocationParent":false}]
     */
    public function LocationsAll($term) //api/v1/products
    {

        $pos = env('MyBookingPalPOS', true);
        $url = 'https://www.mybookingpal.com/api/location/getlocations/?term=' . $term . '&pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Search Locations
     * @param $term
     * @queryParam Search Term required
     * @group BookingPal
     * @return responseProvider
     * @response [
     * {
     * "ID": "88790",
     * "label": "London, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "93865",
     * "label": "London Camden / Kings Cross, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "184393",
     * "label": "London Borough of Wandsworth, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "178049",
     * "label": "Londonderry, VT, United States of America",
     * "isLocationParent": false
     * },
     * {
     * "ID": "179987",
     * "label": "London Borough of Southwark, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "98033",
     * "label": "London Islington, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "88793",
     * "label": "London North West, United Kingdom of GB",
     * "isLocationParent": false
     * },
     * {
     * "ID": "88794",
     * "label": "London South East, United Kingdom of GB",
     * "isLocationParent": false
     * }
     * ]
     */
    public function searchLocations($term) //location/getlocations/{term}
    {
        $pos = env('MyBookingPalPOS', true);
        $url = 'https://demo.mybookingpal.com/api/location/getlocations?term=' . $term . '&pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Search Related Locations
     * @group BookingPal
     * @param $term
     * @queryParam Search Term required
     * @return /App/ResponseProvider
     * @response [
     *              {
     * "locations_response": {
     * "messageCode": "",
     * "message": "",
     * "is_error": false,
     * "result_count": 1,
     * "locations": [
     * {
     * "ID": 13,
     * "label": "London, United Kingdom",
     * "type": null
     * }
     * ]
     * }
     * }
     *          ]
     */
    public function searchRelatedLocations($term)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = 'https://demo.mybookingpal.com/xml/services/json/location/getlocations?term=' . $term . '&pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Locations Check
     * @group BookingPal
     * @param $term
     * @queryParam Search Term required
     * @return /App/ResponseProvider
     *
     * @response [{"error":false,"error_message":"","data":{"ID":"21980"}}]
     */
    public function locationsCheck($term)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = 'http://mybookingpal.com/api/location/getinfo?location=' . $term . '&pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Property Details
     * @group BookingPal
     * @param $locationID
     * @queryParam LocationID required
     * @response {
     * "property_response": {
     * "messageCode": "",
     * "message": "",
     * "is_error": false,
     * "property": {
     * "id": 291355,
     * "name": "Barefoot Dreams",
     * "region": "FL",
     * "latitude": 30.283771,
     * "longitude": -86.018865,
     * "bathroom": 3,
     * "bedroom": 3,
     * "inquiryOnly": false,
     * "person": 6,
     * "description": "Barefoot Dream is located in the beautiful community of Seacrest Beach Fl.  The home sits next to the neighborhood greenway, steps from the 12,000 square foot lagoon pool and a short stroll to the beach.  Enjoy your coffee or relax on the beautiful wrap about porches located on each floor with seating for all.This 3 Bedroom plus open bedroom 3 full bath home is new to the rental market. The home is furnished and decorated lovely with all brand new linens and towels. First floor living area offers a brand new 50” Smart HD TV with wifi access and DVD player.  The Dining area has seating for 8 around a large table plus 2 additional seats at the counter. The kitchen is well equipped with everything you need including a crockpot and Keurig coffee maker.BRAND NEW all 100% cotton 300 thread count linens and 100% combed ring spun cotton towels.  Sleeps 7 – 8- 3 Bedrooms plus Open Bedroom area- 3 Full Baths- Wrap around porches both floors- Natural Gas Grill (never run out of gas)- Natural Gas Instant Hot Water He",
     * "managerName": "TEST Property manager",
     * "currency": "USD",
     * "city": "Seacrest",
     * "country": "US",
     * "images": {
     * "image": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654.jpeg"
     * ],
     * "standard": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654Standard.jpeg"
     * ],
     * "thumbnail": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654Thumb.jpeg"
     * ]
     * },
     * "attributes": {
     * "attribute": []
     * },
     * "rank": 0,
     * "locationid": 129396,
     * "physicaladdress": " 193 Seacrest Beach Boulevard East",
     * "payment_processing_type": 1,
     * "terms_link": "https://www.google.com"
     * }
     * }
     * }
     */
    public function propertyDetails($locationID)
    {
        $pos = env('MyBookingPalPOS', true);

        $url = env('MyBookingPalURL', true) . 'product/' . $locationID . '/propertydetail?pos=' . $pos . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);


        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * gets MBP property summary
     * @group BookingPal
     * @param $productId
     * @queryParam LocationID required
     * @response {
     * "property_response": {
     * "messageCode": "",
     * "message": "",
     * "is_error": false,
     * "property": {
     * "id": 291358,
     * "name": "Bon Temps",
     * "region": "FL",
     * "latitude": 30.2825782,
     * "longitude": -86.0182394,
     * "bathroom": 6,
     * "bedroom": 5,
     * "inquiryOnly": false,
     * "person": 18,
     * "description": "A PRIVATE HEATED POOL IS BEING BUILT ON THIS PROPERTY THIS WINTER TO BE COMPLETED MID-MARCH 2016.THE DETACHED CARRIAGE HOUSE CAN BE BOOKED ALONG WITH THIS MAIN HOUSE, (sleeps 4). It is listed under:VRBO.com/582910.This Rosemary Beach FL vacation rental home has a separate carriage house available which can be booked with this home to provide a 6 bedroom, 6.5 bath combination. The carriage house is VRBO # 582910'Bon Temps', a Rosemary Beach vacation rental South of 30A has never been on a rental program prior to summer 2014. You would think it was built specifically for family vacations with an incredible open living layout with a space for the kids on the 1st floor and massive living space on the 2nd floor.Not only is it a very short walk to the beach, most of that walk is on the Walking / Biking path and not on a Street. Just go out the front of the home and head south about 50 yards to the end of Round Road and pick up the walking / biking path the rest of the way to the beach.The nearest of four Rosemary B",
     * "managerName": "TEST Property manager",
     * "currency": "USD",
     * "city": "Rosemary Beach",
     * "country": "us",
     * "images": {
     * "image": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585.jpeg"
     * ],
     * "standard": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588Standard.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585Standard.jpeg"
     * ],
     * "thumbnail": [
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588Thumb.jpeg",
     * "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585Thumb.jpeg"
     * ]
     * },
     */
    public function getPropertySummary($productId)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'product/' . $productId . '/propertydetail?pos=' . $pos . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);


        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * Location Quote
     * @group BookingPal
     * @param $locationID
     * @param $fromDate
     * @param $toDate
     * @param integer $chlidren (optional)
     * @param integer $adults (optional)
     * @queryParam LocationID required
     * @queryParam fromDate required Start Date of the reservation
     * @queryParam toDate required End Date of the reservation
     * @queryParam children Number of children for the reservation
     * @queryParam children Number of adults for the reservation
     * @response [{"quotes":{"agentCommission":0.0005,"agentCommissionValue":124.45,"available":true,"cancellationItems":[{"cancellationAmount":0,"cancellationDate":"2019-07-06","cancellationNights":0,"cancellationPercentage":100,"cancellationType":1,"daysBeforeArrival":14,"transactionFee":0},{"cancellationAmount":0,"cancellationDate":"2019-07-15","cancellationNights":0,"cancellationPercentage":80,"cancellationType":1,"daysBeforeArrival":5,"transactionFee":0},{"cancellationAmount":0,"cancellationDate":"2019-07-18","cancellationNights":0,"cancellationPercentage":100,"cancellationType":1,"daysBeforeArrival":2,"transactionFee":0},{"cancellationAmount":0,"cancellationDate":"2019-07-20","cancellationNights":0,"cancellationPercentage":0,"cancellationType":1,"daysBeforeArrival":0,"transactionFee":0}],"currency":"USD","firstPayment":100,"fromTime":"11:30 AM","imageUrl":"https:\/\/s3.amazonaws.com\/mybookingpal\/pictures\/tst\/tst\/33175\/original_127320599.jpeg","is_error":false,"message":"","messageCode":"","minstay":4,"paymentSupported":true,"price":2488.89,"product_id":291358,"propertyManagerSupportCC":{"supportAE":false,"supportDINERSCLUB":false,"supportDISCOVER":false,"supportJCB":false,"supportMC":true,"supportVISA":true},"propertyName":"Bon Temps","property_currency":"USD","property_quote":3578,"quote":3577.68,"quote_details":{"quoteDetails":[{"amount":45,"currency":"USD","description":"Rental Damage Protection Coverage ($1,500)","entity":"FEE_MANDATORY","included":true,"paymentInfo":"Mandatory","text":"","type":"GENERAL"},{"amount":295.41,"currency":"USD","description":"Booking fee","entity":"FEE_MANDATORY","included":true,"paymentInfo":"Mandatory","text":"","type":"GENERAL"},{"amount":298.39,"currency":"USD","description":"STATE TAX","entity":"TAX","included":true,"paymentInfo":"","text":"","type":""},{"amount":450,"currency":"USD","description":"Cleaning Fee","entity":"FEE_MANDATORY","included":true,"paymentInfo":"Mandatory","text":"","type":"GENERAL"},{"amount":3577.68,"currency":"USD","description":"Total quote","entity":"","included":false,"paymentInfo":"","text":"","type":""}]},"secondPayment":3477.68,"secondPaymentDate":"2019-07-06","termsLink":"https:\/\/www.google.com","toTime":"10:30 AM"}}]
     */
    public function locationQuote($locationID, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'reservation/quotes?pos=' . $pos . '&productid=' . $locationID . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Reservation Prices
     * @group BookingPal
     * @param $locationID
     * @param $fromDate
     * @param $toDate
     * @queryParam LocationID required
     * @queryParam fromDate required Start Date of the reservation
     * @queryParam toDate required End Date of the reservation
     * @response
     * [{"ranges":{"currency":"USD","is_error":false,"message":"","messageCode":"","propertyId":291358,"range":[{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-06-09","week":24},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-06-16","week":25},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-06-23","week":26},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-06-30","week":27},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-07-07","week":28},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-07-14","week":29},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-07-21","week":30},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-07-28","week":31},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-08-04","week":32},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-08-11","week":33},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-08-18","week":34},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-08-25","week":35},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-09-01","week":36},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-09-08","week":37},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-09-15","week":38},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-09-22","week":39},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-09-29","week":40},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-10-06","week":41},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-10-13","week":42},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-10-20","week":43},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-10-27","week":44},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-11-03","week":45},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-11-10","week":46},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-11-17","week":47},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-11-24","week":48},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-12-01","week":49},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-12-08","week":50},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-12-15","week":51},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-12-22","week":52},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2019-12-29","week":1},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-01-05","week":2},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-01-12","week":3},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-01-19","week":4},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-01-26","week":5},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-02-02","week":6},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-02-09","week":7},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-02-16","week":8},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-02-23","week":9},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-03-01","week":10},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-03-08","week":11},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-03-15","week":12},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-03-22","week":13},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-03-29","week":14},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-04-05","week":15},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-04-12","week":16},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-04-19","week":17},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-04-26","week":18},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-05-03","week":19},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-05-10","week":20},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-05-17","week":21},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-05-24","week":22},{"avgPrice":356,"maxPrice":356,"minPrice":356,"minstay":"4","startDate":"2020-05-31","week":23}]}}]
     */
    public function reservationPrices($locationID, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'reservation/prices?pos=' . $pos . '&productid=' . $locationID . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * Location Prices
     * @group BookingPal
     * @param $locationID
     * @param $fromDate
     * @param $toDate
     * @queryParam LocationID required
     * @queryParam fromDate required Start Date of the reservation
     * @queryParam toDate required End Date of the reservation
     * @response
     *      { "ranges" : { "messageCode" : "", "propertyId" : 291358, "currency" : "USD", "message" : "", "is_error" : false, "range" : [ { "week" : 25, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-06-16" }, { "week" : 26, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-06-23" }, { "week" : 27, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-06-30" }, { "week" : 28, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-07-07" }, { "week" : 29, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-07-14" }, { "week" : 30, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-07-21" }, { "week" : 31, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-07-28" }, { "week" : 32, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-08-04" }, { "week" : 33, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-08-11" }, { "week" : 34, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-08-18" }, { "week" : 35, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-08-25" }, { "week" : 36, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-09-01" }, { "week" : 37, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-09-08" }, { "week" : 38, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-09-15" }, { "week" : 39, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-09-22" }, { "week" : 40, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-09-29" }, { "week" : 41, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-10-06" }, { "week" : 42, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-10-13" }, { "week" : 43, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-10-20" }, { "week" : 44, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-10-27" }, { "week" : 45, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-11-03" }, { "week" : 46, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-11-10" }, { "week" : 47, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-11-17" }, { "week" : 48, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-11-24" }, { "week" : 49, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-12-01" }, { "week" : 50, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-12-08" }, { "week" : 51, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-12-15" }, { "week" : 52, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-12-22" }, { "week" : 1, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2019-12-29" }, { "week" : 2, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-01-05" }, { "week" : 3, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-01-12" }, { "week" : 4, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-01-19" }, { "week" : 5, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-01-26" }, { "week" : 6, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-02-02" }, { "week" : 7, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-02-09" }, { "week" : 8, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-02-16" }, { "week" : 9, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-02-23" }, { "week" : 10, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-03-01" }, { "week" : 11, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-03-08" }, { "week" : 12, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-03-15" }, { "week" : 13, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-03-22" }, { "week" : 14, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-03-29" }, { "week" : 15, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-04-05" }, { "week" : 16, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-04-12" }, { "week" : 17, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-04-19" }, { "week" : 18, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-04-26" }, { "week" : 19, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-05-03" }, { "week" : 20, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-05-10" }, { "week" : 21, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-05-17" }, { "week" : 22, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-05-24" }, { "week" : 23, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-05-31" }, { "week" : 24, "minPrice" : 356, "maxPrice" : 356, "avgPrice" : 356, "minstay" : "4", "startDate" : "2020-06-07" } ] } }
     *
     */
    public function locationPrices($locationID, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'reservation/prices?pos=' . $pos . '&productid=' . $locationID . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * Availibility Calendar
     * @group BookingPal
     * @param $locationID
     * @param $fromDate
     * @param $toDate
     * @queryParam LocationID required
     * @queryParam fromDate required Start Date of the reservation
     * @queryParam toDate required End Date of the reservation
     * @response {"availability_calendar":{"is_error":false,"items":[{"endDate":"2019-07-27","startDate":"2019-07-20"}],"message":"","messageCode":""}}
     */
    public function availabilityCalendar($locationID, $fromDate, $toDate)
    {

        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'reservation/available_calendar?pos=' . $pos . '&productid=' . $locationID . '&fromdate=' . $fromDate . '&todate=' . $toDate;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * List Locations
     * @group BookingPal
     * @param $type
     * @queryParam type required The type of search example "Accomodation"
     * @response {"availability_calendar":{"is_error":false,"items":[{"endDate":"2019-07-27","startDate":"2019-07-20"}],"message":"","messageCode":""}}
     */
    public function listLocations($type)
    {

        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'product/list/channel/' . $type . '?pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }


    /**
     * Book Property
     * @group BookingPal
     * @authenticated
     * @param Request $request
     * @bodyParam reservation json required The Reservations Data.
     * @bodyParam pos string required The MBP POS.
     * @bodyParam productid integer required The Product ID.
     * @bodyParam fromdate date required The From Date.
     * @bodyParam todate date required The To Date.
     * @bodyParam currency string required The Currency.
     * @bodyParam adult integer required The Number of Adults.
     * @bodyParam child integer required The Number of Children.
     * @bodyParam emailaddress string required The Booking Customer's Email Address.
     * @bodyParam familyname string required The Booking Customer's Last Name.
     * @bodyParam firstname string required The Booking Customer's First Name.
     * @bodyParam cardnumber integer required
     * @bodyParam cardmonth integer required
     * @bodyParam cardyear integer required
     * @bodyParam amount integer required
     * @bodyParam telnumber integer required
     * @bodyParam cardtype integer required
     * @bodyParam notes string
     * @bodyParam cc_security_code integer required
     * @bodyParam cc_address integer required
     * @bodyParam cc_country string required
     * @bodyParam cc_state string required
     * @bodyParam cc_zip string required
     * @bodyParam cc_city string required
     * @bodyParam cc_bdm string
     * @bodyParam cc_bdd string
     * @bodyParam cc_bdy string
     * @response {
     * "reservation_response":{
     * "is_error":false,
     * "message":"",
     * "downPayment":561,
     * "propertyName":"Apartment Serviten",
     * "propertyAddress":"Vienna, Austria",
     * "propertyManagerName":"Interhome AG - Manager",
     * "propertyManagerEmail":"info@interhome.com",
     * "propertyManagerPhone":"(+41)(0)43 810 9126",
     * "reservation":{
     * "id":13840088,
     * "checkin":"2015-10-13",
     * "checkout":"2015-10-16",
     * "currency":"USD",
     * "price":561
     * }
     * }
     * }
     */

    public function bookProperty(Request $request)
    {
        if ($request->isMethod('post')) {

            $url = 'https://demo.mybookingpal.com/xml/services/json/reservation/payment/create';

            $data_string = $request->all();

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_string));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json"
            ));

            $result = curl_exec($ch);
            curl_close($ch);

            return $this->ResponseServiceProvider->preferredFormat($result);
        }
    }

    /**
     * Cancel Property
     * @group BookingPal
     * @param $reservationID
     * @param $reason
     * @param $amount
     * @queryParam reservationID
     * @queryParam reason [1 = I found a better place to stay; 2 = I found a better place to stay on a different website; 3 = I need to change the details of my reservation; 4 = I am no longer visiting the destination; 5 = For personal reasons]
     * @queryParam amount
     * @response { "cancel_reservation" : { "messageCode" : "", "message" : "Your booking was canceled or in canceling state", "is_error" : false } }
     */
    public function cancelProperty($reservationID, $reason, $amount)
    {

        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true) . 'reservation/cancel?reservationId=' . $reservationID . '&reason=' . $reason . '&amount_collected=' . $amount . '&pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

}
