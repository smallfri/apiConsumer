<?php

namespace App\Http\Controllers;

use App\Helper;
use App\ResponseProvider;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use SimpleXMLElement;
use SoapBox\Formatter\Formatter;

/**
 * Class BookingPalController
 * @package App\Http\Controllers
 */
class BookingPalController extends Controller
{
    private $ResponseServiceProvider;
    
    public function __construct()
    {
        $this->ResponseServiceProvider = new ResponseProvider();
    }

    /**
     * @param $type
     * @return ResponseProvider
     * @response {
            "items_response": {
            "messageCode": "",
            "items": {
            "entity": "Product",
            "id": null,
            "type": "Accommodation",
            "message": null,
            "item": [
            {
            "name": "Barefoot Dreams",
            "id": "291355"
            },
            {
            "name": "Beau Soleil",
            "id": "291356"
            },
            {
            "name": "Bon Temps",
            "id": "291358"
            },
            {
            "name": "Easy Peasy",
            "id": "291359"
            },
            {
            "name": "Fish House",
            "id": "291360"
            },
            {
            "name": "Grayt Fun",
            "id": "291361"
            },
            {
            "name": "Lazy Dogs",
            "id": "291362"
            },
            {
            "name": "Lemon Squeezy",
            "id": "291363"
            },
            {
            "name": "Lucky Dogs",
            "id": "291364"
            },
            {
            "name": "Peace by the Sea",
            "id": "291366"
            },
            {
            "name": "Salty Paws Bungalow",
            "id": "291367"
            },
            {
            "name": "Seagrove Escape",
            "id": "291368"
            },
            {
            "name": "Starry Nights",
            "id": "291369"
            },
            {
            "name": "Three Times the Fun",
            "id": "291370"
            },
            {
            "name": "Toes in the Sand",
            "id": "291371"
            }
            ],
            "xsl": "'no_xsl'"
            },
            "message": "",
            "is_error": false
            }
            }
     */
    public function getAllProducts($type) //api/v1/products
    {

        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'product/list/channel/' . $type . '?pos=' . $pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * @param $name
     * @return responseProvider
     * @response [
            {
            "ID": "88790",
            "label": "London, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "93865",
            "label": "London Camden / Kings Cross, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "184393",
            "label": "London Borough of Wandsworth, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "178049",
            "label": "Londonderry, VT, United States of America",
            "isLocationParent": false
            },
            {
            "ID": "179987",
            "label": "London Borough of Southwark, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "98033",
            "label": "London Islington, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "88793",
            "label": "London North West, United Kingdom of GB",
            "isLocationParent": false
            },
            {
            "ID": "88794",
            "label": "London South East, United Kingdom of GB",
            "isLocationParent": false
            }
            ]
     */
    public function getLocationsByTerm($term) //location/getlocations/{term}
    {
        $pos = env('MyBookingPalPOS', true);
        $url = 'https://www.mybookingpal.com/api/location/getlocations/?term='.$term.'&pos='.$pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * @param $location
     * @return /App/ResponseProvider
     *
     * @response {
            "location": {
            "locationid": null,
            "country": null,
            "code": null,
            "name": null,
            "state": null,
            "subdivision": null,
            "type": null,
            "date": null,
            "iata": null,
            "coordinates": null,
            "remarks": null,
            "latitude": null,
            "longitude": null,
            "altitude": null,
            "message": "Invalid or absent location ID getinfo",
            "xsl": null,
            "id": null
            }
        }
     */
    public function getLocationsGetInfo($location)
    {
        $pos = null;
        $url = env('MyBookingPalURL', true).'location/getinfo/?location='.$location.'&pos='.$pos;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * gets MBP property details
     * @param $productId
     * @response {
            "property_response": {
            "messageCode": "",
            "message": "",
            "is_error": false,
            "property": {
            "id": 291355,
            "name": "Barefoot Dreams",
            "region": "FL",
            "latitude": 30.283771,
            "longitude": -86.018865,
            "bathroom": 3,
            "bedroom": 3,
            "inquiryOnly": false,
            "person": 6,
            "description": "Barefoot Dream is located in the beautiful community of Seacrest Beach Fl.  The home sits next to the neighborhood greenway, steps from the 12,000 square foot lagoon pool and a short stroll to the beach.  Enjoy your coffee or relax on the beautiful wrap about porches located on each floor with seating for all.This 3 Bedroom plus open bedroom 3 full bath home is new to the rental market. The home is furnished and decorated lovely with all brand new linens and towels. First floor living area offers a brand new 50” Smart HD TV with wifi access and DVD player.  The Dining area has seating for 8 around a large table plus 2 additional seats at the counter. The kitchen is well equipped with everything you need including a crockpot and Keurig coffee maker.BRAND NEW all 100% cotton 300 thread count linens and 100% combed ring spun cotton towels.  Sleeps 7 – 8- 3 Bedrooms plus Open Bedroom area- 3 Full Baths- Wrap around porches both floors- Natural Gas Grill (never run out of gas)- Natural Gas Instant Hot Water He",
            "managerName": "TEST Property manager",
            "currency": "USD",
            "city": "Seacrest",
            "country": "US",
            "images": {
            "image": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654.jpeg"
            ],
            "standard": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654Standard.jpeg"
            ],
            "thumbnail": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320677Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320676Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320675Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320674Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320673Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320672Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320671Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320670Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320669Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320668Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320667Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320666Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320665Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320664Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320663Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320662Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320661Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320660Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320659Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320658Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320657Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320656Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320655Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/68198/original_127320654Thumb.jpeg"
            ]
            },
            "attributes": {
            "attribute": []
            },
            "rank": 0,
            "locationid": 129396,
            "physicaladdress": " 193 Seacrest Beach Boulevard East",
            "payment_processing_type": 1,
            "terms_link": "https://www.google.com"
            }
            }
            }
     */
    public function getPropertyDetails($productId)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'product/' . $productId . '/propertydetail?pos=' . $pos . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * gets MBP property summary
     * @param $productId
     * @response {
            "property_response": {
            "messageCode": "",
            "message": "",
            "is_error": false,
            "property": {
            "id": 291358,
            "name": "Bon Temps",
            "region": "FL",
            "latitude": 30.2825782,
            "longitude": -86.0182394,
            "bathroom": 6,
            "bedroom": 5,
            "inquiryOnly": false,
            "person": 18,
            "description": "A PRIVATE HEATED POOL IS BEING BUILT ON THIS PROPERTY THIS WINTER TO BE COMPLETED MID-MARCH 2016.THE DETACHED CARRIAGE HOUSE CAN BE BOOKED ALONG WITH THIS MAIN HOUSE, (sleeps 4). It is listed under:VRBO.com/582910.This Rosemary Beach FL vacation rental home has a separate carriage house available which can be booked with this home to provide a 6 bedroom, 6.5 bath combination. The carriage house is VRBO # 582910'Bon Temps', a Rosemary Beach vacation rental South of 30A has never been on a rental program prior to summer 2014. You would think it was built specifically for family vacations with an incredible open living layout with a space for the kids on the 1st floor and massive living space on the 2nd floor.Not only is it a very short walk to the beach, most of that walk is on the Walking / Biking path and not on a Street. Just go out the front of the home and head south about 50 yards to the end of Round Road and pick up the walking / biking path the rest of the way to the beach.The nearest of four Rosemary B",
            "managerName": "TEST Property manager",
            "currency": "USD",
            "city": "Rosemary Beach",
            "country": "us",
            "images": {
            "image": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585.jpeg"
            ],
            "standard": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588Standard.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585Standard.jpeg"
            ],
            "thumbnail": [
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320597Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320602Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320601Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320598Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320596Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320595Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320612Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320613Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320592Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320600Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320614Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320611Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320610Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320606Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320608Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320594Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320605Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320604Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320593Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320603Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320607Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320609Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320589Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320590Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320591Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320587Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320586Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320588Thumb.jpeg",
            "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320585Thumb.jpeg"
            ]
            },
     */
    public function getPropertySummary($productId)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'product/' . $productId . '/propertydetail?pos=' . $pos . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * gets MBP quote
     * @param $productId
     * @param $fromDate
     * @param $toDate
     * @response {
            "quotes": {
            "is_error": false,
            "message": "",
            "messageCode": "",
            "fromTime": "11:30 AM",
            "toTime": "10:30 AM",
            "currency": "USD",
            "quote": 4856.62,
            "price": 3555.56,
            "termsLink": "https://www.google.com",
            "minstay": 4,
            "firstPayment": 100,
            "secondPayment": 4756.62,
            "propertyName": "Bon Temps",
            "imageUrl": "https://s3.amazonaws.com/mybookingpal/pictures/tst/tst/33175/original_127320599.jpeg",
            "agentCommission": 0.0005,
            "agentCommissionValue": 177.78,
            "secondPaymentDate": "2018-12-18",
            "paymentSupported": true,
            "quote_details": {
            "quoteDetails": [
            {
            "amount": 405.06,
            "currency": "USD",
            "description": "STATE TAX",
            "entity": "TAX",
            "included": true,
            "paymentInfo": "",
            "text": "",
            "type": ""
            },
            {
            "amount": 450,
            "currency": "USD",
            "description": "Cleaning Fee",
            "entity": "FEE_MANDATORY",
            "included": true,
            "paymentInfo": "Mandatory",
            "text": "",
            "type": "GENERAL"
            },
            {
            "amount": 45,
            "currency": "USD",
            "description": "Rental Damage Protection Coverage ($1,500)",
            "entity": "FEE_MANDATORY",
            "included": true,
            "paymentInfo": "Mandatory",
            "text": "",
            "type": "GENERAL"
            },
            {
            "amount": 401.01,
            "currency": "USD",
            "description": "Booking fee",
            "entity": "FEE_MANDATORY",
            "included": true,
            "paymentInfo": "Mandatory",
            "text": "",
            "type": "GENERAL"
            },
            {
            "amount": 4856.62,
            "currency": "USD",
            "description": "Total quote",
            "entity": "",
            "included": false,
            "paymentInfo": "",
            "text": "",
            "type": ""
            }
            ]
            },
            "cancellationItems": [
            {
            "cancellationAmount": 0,
            "cancellationDate": "2018-12-27",
            "cancellationNights": 0,
            "cancellationPercentage": 80,
            "cancellationType": 1,
            "daysBeforeArrival": 5,
            "transactionFee": 0
            }
            ],
            "propertyManagerSupportCC": {
            "supportAE": false,
            "supportDINERSCLUB": false,
            "supportDISCOVER": false,
            "supportJCB": false,
            "supportMC": true,
            "supportVISA": true
            },
            "available": true,
            "property_quote": 4857,
            "property_currency": "USD",
            "product_id": 291358
            }
            }
     */
    public function getQuote($productId, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'reservation/quotes?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * get MBP prices
     * @param $productId
     * @param $fromDate
     * @param $toDate
     *
     * @response {
            "ranges": {
            "messageCode": "",
            "propertyId": 291358,
            "currency": "USD",
            "message": "",
            "is_error": false,
            "range": [
            {
            "week": 46,
            "minPrice": 356,
            "maxPrice": 356,
            "avgPrice": 356,
            "minstay": "4",
            "startDate": "2018-11-11"
            },
            {
            "week": 47,
            "minPrice": 356,
            "maxPrice": 356,
            "avgPrice": 356,
            "minstay": "4",
            "startDate": "2018-11-18"
            }
     * ]
     *
     */
    public function getPrices($productId, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'reservation/prices?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * gets MBP availability
     * @param $productId
     * @param $fromDate
     * @param $toDate
     * @response {
            "availability_calendar": {
            "messageCode": "",
            "items": [
            {
            "startDate": "2017-11-29",
            "endDate": "2018-07-03"
            },
            {
            "startDate": "2018-07-18",
            "endDate": "2018-07-28"
            },
            {
            "startDate": "2018-08-16",
            "endDate": "2018-08-31"
            },
            {
            "startDate": "2018-10-08",
            "endDate": "2018-10-08"
            },
            {
            "startDate": "2018-10-10",
            "endDate": "2018-10-18"
            },
            {
            "startDate": "2019-03-05",
            "endDate": "2019-03-05"
            }
            ],
            "message": "",
            "is_error": false
            }
            }
     */
    public function getAvailability($productId, $fromDate, $toDate)
    {

        $pos = env('MyBookingPalPOS', true);
        $url = env('MyBookingPalURL', true).'reservation/available_calendar?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['Accept' => 'application/json']
        ]);

        

        return $this->ResponseServiceProvider->preferredFormat($response->getBody());

    }


    /**
     * creates a MBP booking
     * @param Request $request
     */
    public function createBooking(Request $request)
    {
        if ($request->isMethod('post')) {

            $pos = env('MyBookingPalPOS', true);
            $url = 'https://www.mybookingpal.com/xml/services/json/reservation/payment/create?pos=' . $pos;
            $data_string = $request->all();

            $ch = curl_init( $url );
            $payload = json_encode($data_string);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            curl_close($ch);

            return $this->ResponseServiceProvider->preferredFormat($result);

        }


    }

}
