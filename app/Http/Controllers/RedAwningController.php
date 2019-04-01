<?php

namespace App\Http\Controllers;

use App\Helper;
use App\ResponseProvider;
use App\RAAvailability;
use App\RAContent;
use App\RAListing;
use App\RACico;
use App\RAPhoto;
use App\RAPricePeriod;
use App\RARoomConfiguration;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class RedAwningController
 * @package App\Http\Controllers
 */
class RedAwningController extends Controller
{
    /**
     * @var mixed
     */
    public $url;
    /**
     * @var
     */
    public $_limit;
    /**
     * @var
     */
    public $_total;
    /**
     * @var
     */
    public $_page;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = $url = env('RedAwningURL');
    }

    /**
     * get listings from API
     * @group RedAwning
     * @param $limit
     * @param $offset
     * @return ResponseProvider
     * @response {
    "listing_id": "200508",
    "url_alias": "rental-property/chophouse-row-test-property-seattle",
    "content": {
    "title": "Chophouse Row - Test Property",
    "description": "Chophouse Row combines a historic auto row building with a new steel and concrete loft office building. Its pedestrian alley and courtyard host a collection of local tenants that focus on delivering morning-into-evening food, beverage, and retail options to both residents and visitors to the neighborhood.",
    "property_type": "residence",
    "special_terms": "",
    "view": "",
    "bathrooms": 1,
    "bedrooms": 2,
    "beds_king": 1,
    "beds_queen": 1,
    "beds_double": 0,
    "beds_twin": 0,
    "beds_sofa": 0,
    "beds_bunk": 0,
    "beds_air_mattress": 0,
    "kitchen": "none",
    "pool": false,
    "children_ok": "yes",
    "room_configurations": [
    {
    "name": "Bedroom 2",
    "beds": [
    "King Bed"
    ]
    },
    {
    "name": "Bedroom 1",
    "beds": [
    "Queen Bed"
    ]
    }
    ],
    "sleep_max": 4,
    "pets_allowed": true,
    "smoking_allowed": false,
    "amenities": [
    "Balcony",
    "Blender",
    "Book Collection",
    "Internet -- Wireless",
    "Shower",
    "Terrace"
    ],
    "location": {
    "address": {
    "street_address": "1424 11th Avenue",
    "street_address2": "",
    "city": "Seattle",
    "province": "WA",
    "postal_code": "98122",
    "country": "us"
    },
    "geo_code": {
    "lat": 47.6137,
    "lng": -122.3177
    }
    },
    "handicap_accessible": false,
    "square_feet": 0,
    "photos": [
    {
    "url": "https://stage.redawning.com/sites/default/files/rental_property/200508/44a3d4a54b60e178a30839fc5d46e992_None.jpeg",
    "order": 0,
    "tags": [
    "Pottery,Vase,Path,Sidewalk,Walkway"
    ],
    "title": "",
    "width": 667,
    "height": 1000,
    "timestamp": "2018-07-05T16:56:52+00:00"
    },
    {
    "url": "https://stage.redawning.com/sites/default/files/rental_property/200508/a5f7fd7db56f7a1ae16a68968e97d212_None.jpeg",
    "order": 1,
    "tags": [
    "Chair,Furniture,Food,Restaurant,Balcony"
    ],
    "title": "",
    "width": 1000,
    "height": 669,
    "timestamp": "2018-07-05T16:57:09+00:00"
    },
    {
    "url": "https://stage.redawning.com/sites/default/files/rental_property/200508/d4aa5d518ba5e225e2841c7b6b27a126_None.jpeg",
    "order": 2,
    "tags": [
    "Path,Sidewalk,Walkway,Vine,Building"
    ],
    "title": "",
    "width": 661,
    "height": 1000,
    "timestamp": "2018-07-05T16:57:26+00:00"
    }
    ]
    },
    "cico": [
    {
    "start_date": "2018-07-05",
    "end_date": "2018-12-31",
    "check_in_allowed": {
    "monday": true,
    "tuesday": true,
    "wednesday": true,
    "thursday": true,
    "friday": true,
    "saturday": true,
    "sunday": true
    },
    "check_out_allowed": {
    "monday": true,
    "tuesday": true,
    "wednesday": true,
    "thursday": true,
    "friday": true,
    "saturday": true,
    "sunday": true
    }
    },
    {
    "start_date": "2019-01-01",
    "end_date": "2019-03-31",
    "check_in_allowed": {
    "monday": false,
    "tuesday": true,
    "wednesday": false,
    "thursday": true,
    "friday": false,
    "saturday": false,
    "sunday": false
    },
    "check_out_allowed": {
    "monday": true,
    "tuesday": true,
    "wednesday": true,
    "thursday": true,
    "friday": true,
    "saturday": true,
    "sunday": true
    }
    }
    ],
    "cico_times": {
    "check_in_start": 54000,
    "check_in_end": 61200,
    "check_out": 39600
    },
    "price": {
    "currency": "USD",
    "base_weekday_price": 1.1,
    "base_weekend_price": 1.1,
    "base_weekly_price": 1.1,
    "base_minstay": 1,
    "other": 1,
    "tax_percent": 11,
    "nightly_tax": 0,
    "cleaning_fee": 352.5
    },
    "price_periods": [
    {
    "period_start": "2018-07-05",
    "period_end": "2018-12-31",
    "weekday_price": 245.3,
    "weekend_price": 258.5,
    "weekly_price": 221.1,
    "minstay": 2,
    "price_period_id": "676838508",
    "name": "Price Period 676838508"
    }
    ],
    "availability": [
    {
    "period": {
    "period_start": "2030-04-01",
    "period_end": "2030-04-01",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2018-12-25",
    "period_end": "2018-12-26",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2019-01-01",
    "period_end": "2023-07-05",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2018-12-16",
    "period_end": "2018-12-22",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2030-05-19",
    "period_end": "2030-05-27",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2018-12-07",
    "period_end": "2018-12-08",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2030-06-08",
    "period_end": "2030-06-14",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2018-12-28",
    "period_end": "2018-12-29",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2030-04-27",
    "period_end": "2030-05-08",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2030-05-09",
    "period_end": "2030-05-17",
    "type": "NotAvailable"
    }
    },
    {
    "period": {
    "period_start": "2018-12-10",
    "period_end": "2018-12-13",
    "type": "NotAvailable"
    }
    }
    ],
    "created": "2018-07-05T17:15:28.000Z",
    "updated": "2018-11-12T18:31:01.000Z",
    "status": {
    "published": true,
    "bookable": true,
    "open": true
    },
    "photos": [],
    "policies": [],
    "repconfig": []
    }
     *
     *
     */
    public function getListingsFromAPI($limit, $offset)
    {

        // Setting the HTTP Request Headers
        $request_headers = array();
        $request_headers[] = 'x-api-key: ' . env('RedAwningPubKey');

        // Performing the HTTP request
        $ch = curl_init(env('RedAwningURL') . '/listings?limit=' . $limit . '&offset=' . $offset . '&tid=' . rand(1000, 10));

        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $response = curl_exec($ch);

        $headers = Helper::get_headers_from_curl_response($response);
        $xTotalCount = $headers['x-total-count'];

        $x = $offset = 1;
        $limit = 5; //change this for more results at one time
        while ($x <= round($xTotalCount / $limit)) {

            if ($x == 1) {

                $offset = 0;
            } else {
                $offset = $offset + $limit;
            }

            $x++;

            $random = rand(1000, 10);
            // Performing the HTTP request

            $ch = curl_init(env('RedAwningURL') . 'listings?limit=' . $limit . '&offset=' . $offset . '&tid=' . $random);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            curl_close($ch);

            $listings = json_decode($response, true);
            $listingsResponse = [];
            foreach ($listings AS $listing) {

                $listingsResponse[] = $listing;

            }

            $ResponseServiceProvider = new ResponseProvider();
            return $ResponseServiceProvider->preferredFormat($listingsResponse);
        }


    }

    /**
     * Here we call listings to load the database, only done once, then call changes
     *
     * @return
     */
    public function absorbListings($endpoint)
    {
        // Setting the HTTP Request Headers
        $request_headers = array();
        $request_headers[] = 'x-api-key: ' . env('RedAwningPubKey');

        // Performing the HTTP request
        $ch = curl_init($this->url . $endpoint);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $response = curl_exec($ch);

        $headers = Helper::get_headers_from_curl_response($response);
        $xTotalCount = $headers['x-total-count'];

        $x = $offset = 1;
        $limit = 5; //change this for more results at one time
        while ($x <= round($xTotalCount / $limit)) {

            if ($x == 1) {

                $offset = 0;
            } else {
                $offset = $offset + $limit;
            }

            $x++;

            $random = rand(1000, 10);
            // Performing the HTTP request

            $ch = curl_init($this->url . '/' . $endpoint . '?limit=' . $limit . '&offset=' . $offset . '&tid=' . $random);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            curl_close($ch);

            $listings = json_decode($response, true);

            foreach ($listings AS $listing) {

                RAListing::updateOrCreate([
                    'listing_id' => $listing['listing_id'],
                    'url_alias' => $listing['url_alias'],
                    'created' => date("Y-m-d",strtotime($listing['created'])),
                    'updated' => date("Y-m-d",strtotime($listing['updated'])),
                    'cico_times' => json_encode($listing['cico_times']),
                    'price' => str_limit(json_encode($listing['price'],255)),
                    'status' => json_encode($listing['status']),
                    'photos' => json_encode($listing['photos']),
                    'policies' => json_encode($listing['policies']),
                    'repconfig' => json_encode($listing['repconfig'])
                ]);

                RAContent::updateOrCreate([
                    'redawning_listing_id' => $listing['listing_id'],
                    'title' => $listing['content']['title'],
                    'description' => $listing['content']['description'],
                    'property_type' => $listing['content']['property_type'],
                    'special_terms' => $listing['content']['special_terms'],
                    'view' => $listing['content']['view'],
                    'bathrooms' => $listing['content']['bathrooms'],
                    'bedrooms' => $listing['content']['bedrooms'],
                    'beds_king' => $listing['content']['beds_king'],
                    'beds_queen' => $listing['content']['beds_queen'],
                    'beds_double' => $listing['content']['beds_double'],
                    'beds_twin' => $listing['content']['beds_twin'],
                    'beds_sofa' => $listing['content']['beds_sofa'],
                    'beds_bunk' => $listing['content']['beds_bunk'],
                    'beds_air_mattress' => $listing['content']['beds_air_mattress'],
                    'kitchen' => $listing['content']['kitchen'],
                    'pool' => $listing['content']['pool'],
                    'children_ok' => $listing['content']['children_ok'],
                    'pets_allowed' => $listing['content']['pets_allowed'],
                    'smoking_allowed' => $listing['content']['smoking_allowed'],
                    'amenities' => json_encode($listing['content']['amenities']),
                    'location' => json_encode($listing['content']['location']),
                    'handicap_accessible' => $listing['content']['handicap_accessible'],
                    'square_feet' => $listing['content']['square_feet']
                ]);

                foreach ($listing['content']['room_configurations'] AS $photo) {
                    RARoomConfiguration::updateOrCreate([
                        'redawning_listing_id' => $listing['listing_id'],
                        'name' => $photo['name'],
                        'beds' => json_encode($photo['beds'])
                    ]);
                }

                foreach ($listing['content']['photos'] AS $photo) {
                    RAPhoto::updateOrCreate([
                        'redawning_listing_id' => $listing['listing_id'],
                        'url' => $photo['url'],
                        'order' => $photo['order'],
                        'tags' => json_encode($photo['tags']),
                        'title' => $photo['title'],
                        'width' => $photo['width'],
                        'height' => $photo['height'],
                        'timestamp' => $photo['timestamp']
                    ]);
                }

                foreach ($listing['cico'] as $cico) {
                    RACico::updateOrCreate([
                        'redawning_listing_id' => $listing['listing_id'],
                        'start_date' => $cico['start_date'],
                        'end_date' => $cico['end_date'],
                        'check_in_allowed' => json_encode($cico['check_in_allowed']),
                        'check_out_allowed' => json_encode($cico['check_out_allowed'])
                    ]);

                }

                foreach ($listing['price_periods'] as $price_period) {
                    RAPricePeriod::updateOrCreate([
                        'redawning_listing_id' => $listing['listing_id'],
                        'period_start' => $price_period['period_start'],
                        'period_end' => $price_period['period_end'],
                        'weekday_price' => $price_period['weekday_price'],
                        'weekend_price' => $price_period['weekend_price'],
                        'weekly_price' => $price_period['weekly_price'],
                        'minstay' => $price_period['minstay'],
                        'name' => $price_period['name']
                    ]);
                }
                foreach ($listing['availability'] as $row) {

                    RAAvailability::updateOrCreate([
                        'redawning_listing_id' => $listing['listing_id'],
                        'period' => json_encode($row['period'])
                    ]);

                }
            }
        }
        return '{"status":"success"}';
    }

    /**
     * get listing import
     * @group RedAwning
     * @param $listingId
     * @return string
     * @response {
     *      "status":"success"
     * }
     */
    public function getTriggerListingsImport()
    {
        return $this->absorbListings('listings');
    }

    /**
     * get changes
     * @group RedAwning
     * @return string
     * @response {
     *      "status":"success"
     * }
     */
    public function getTriggerChangesImport()
    {
        return $this->absorbListings('changes');
    }

    /**
     * get changes import
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response  {
                "published": true,
                "bookable": true,
                "open": true
            }
     */
    public function getListingStatus($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/status';

        $client = new Client();

        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get listing availability
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response {
     *      "availability":
     *          [
                    {
                        "period":
                         *                  {
                        "period_start": "2019-02-05",
                        "period_end": "2019-02-07",
                        "type": "NotAvailable"
                        }
                    },
                    {
                    "period":
                     *                  {
                    "period_start": "2018-08-27",
                    "period_end": "2023-08-27",
                    "type": "NotAvailable"
                    }
                }
                ]
            }
     */
    public function getListingAvailability($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/availability';

        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get listing details
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     */
    public function getListingDetails($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/property_details';

        $client = new Client();
        $response = $client->get($this->url  . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * get listing by id
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response
     *      {
                "listing_id": "200511",
                "url_alias": "rental-property/kapalua-bay-villa-ocean-view-test-property-kapalua",
                "content": {
                    "title": "Kapalua Bay Villa with Ocean View - Test Property",
                    "description": "This gorgeous Beach Front Villa occupies the top two floors of building 21. It has two completely private master bedrooms with en-suite. Main floor master has a private lanai. Both master suites have spectacular ocean views. There are 3 bathrooms; one with soaking tub. This lovely retreat was created by a well known designer, displaying only the finest quality original art, high-end furnishings and appliances.\n\nRelax and rejuvenate. Let the warm tropical breezes and soothing sounds of the ocean transport you to a place of complete calm.\n\nIncluded are the following amenities:\nUse of Resort Pools and Tennis Courts\n\nSecure Wireless High Speed Internet\nBeach Chairs/Beach Towels\nHair Dryers/ Cozy Robes\nMid stay Towel and Linen service (for 7 or more days)\nComplimentary Local Resort Shuttle\nGreeter Service to welcome you to the island and orient you with your vacation home (on request)\nConvenient Complimentary Parking behind your villa\nThe personal attention of our on site concierge to help you plan activities, and highlight the features of the area.\nOn site manager available live 24/7 to see to your every need and ensure you and your guests are happy and comfortable.\n\nAloha....See you soon!\n\nRooms and Amenities\n\nProperty Type Villa, 2 story\nBeds 1 king bed, 1 queen bed, 1 sleeper sofa\nBathrooms 3 bathrooms\nRooms Sleeps 6, 2 bedroom 3 bath complete remodel\nFloor Area 2650 square feet\n",
                    "property_type": "villa",
                    "special_terms": "",
                    "view": "",
                    "bathrooms": 3,
                    "bedrooms": 2,
                    "beds_king": 1,
                    "beds_queen": 1,
                    "beds_double": 0,
                    "beds_twin": 0,
                    "beds_sofa": 1,
                    "beds_bunk": 0,
                    "beds_air_mattress": 0,
                    "kitchen": "none",
                    "pool": false,
                    "children_ok": "yes",
                "room_configurations": [
                {
                "name": "Bedroom 1",
                "beds": [
                    "King Bed"
                ]
                },
                {
                "name": "Bedroom 2",
                "beds": [
                     "Queen Bed"
                ]
                },
                {
                "name": "Living Room",
                "beds": [
                    "Sofa Bed"
                ]
                }
                ],
                    "sleep_max": 5,
                    "pets_allowed": false,
                    "smoking_allowed": false,
                    "amenities": [],
                    "location": {
                    "address": {
                    "street_address": "500 Bay Drive",
                    "street_address2": "Unit #21B2",
                    "city": "Kapalua",
                    "province": "HI",
                    "postal_code": "96761",
                    "country": "us"
                },
                    "geo_code": {
                    "lat": 0,
                    "lng": 0
                }
                },
                    "handicap_accessible": false,
                    "square_feet": 2650,
                "photos": [
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/bb6149fdfdd2a2284d62e02adcc08edb.jpeg",
                    "order": 0,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:39:43+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/9af42dac889a323d2c2f4e9e0c6bb833.jpeg",
                    "order": 1,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:39:56+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/f5a4c064623ee2fa7c045a77401f8882.jpeg",
                    "order": 2,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:40:11+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/275b58100297cc19222f59859747a099.jpeg",
                    "order": 3,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:40:26+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/207fbf7f77850bf71b9b472817a909b5.jpeg",
                    "order": 4,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:40:41+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/e6f0a50abe994970ce73b826290346d0.jpeg",
                    "order": 5,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:40:57+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/b15782b97e7675111a8f03ab34b53755.jpeg",
                    "order": 6,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:41:13+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/699405ca363f0273e62f17b61c4d6912.jpeg",
                    "order": 7,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:41:28+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/92e2a4a9fb0bd48719b05a0cf170eb29.jpeg",
                    "order": 8,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:41:43+00:00"
                },
                {
                    "url": "https://devsite.stage.redawning.com/sites/default/files/rental_property/200511/05f3d11a6e75d0bcf461e4ed72486547.jpeg",
                    "order": 9,
                    "tags": [],
                    "title": "",
                    "width": 90,
                    "height": 68,
                    "timestamp": "2018-07-06T23:41:59+00:00"
                }
                ]
                },
                "cico": [
                {
                "start_date": "2018-07-10",
                "end_date": "2018-10-31",
                "check_in_allowed": {
                    "monday": true,
                    "tuesday": true,
                    "wednesday": true,
                    "thursday": true,
                    "friday": true,
                    "saturday": true,
                    "sunday": true
                },
                "check_out_allowed": {
                    "monday": true,
                    "tuesday": true,
                    "wednesday": true,
                    "thursday": true,
                    "friday": true,
                    "saturday": true,
                    "sunday": true
                }
                },
                {
                "start_date": "2018-11-01",
                "end_date": "2019-01-31",
                "check_in_allowed": {
                    "monday": false,
                    "tuesday": false,
                    "wednesday": false,
                    "thursday": false,
                    "friday": false,
                    "saturday": false,
                    "sunday": false
                },
                "check_out_allowed": {
                    "monday": false,
                    "tuesday": false,
                    "wednesday": false,
                    "thursday": false,
                    "friday": false,
                    "saturday": false,
                    "sunday": false
                }
                },
                {
                "start_date": "2019-02-01",
                "end_date": "2019-09-30",
                "check_in_allowed": {
                    "monday": false,
                    "tuesday": false,
                    "wednesday": false,
                    "thursday": false,
                    "friday": false,
                    "saturday": false,
                    "sunday": false
                },
                "check_out_allowed": {
                    "monday": false,
                    "tuesday": false,
                    "wednesday": false,
                    "thursday": false,
                    "friday": false,
                    "saturday": false,
                    "sunday": false
                }
                },
                {
                    "start_date": "2019-10-01",
                    "end_date": "2023-12-30",
                    "check_in_allowed": {
                    "monday": true,
                    "tuesday": true,
                    "wednesday": true,
                    "thursday": true,
                    "friday": true,
                    "saturday": true,
                    "sunday": true
                },
                "check_out_allowed": {
                    "monday": true,
                    "tuesday": true,
                    "wednesday": true,
                    "thursday": true,
                    "friday": true,
                    "saturday": true,
                    "sunday": true
                    }
                }
                ],
                "cico_times": {
                    "check_in_start": 57600,
                    "check_in_end": 57600,
                    "check_out": 39600
                },
                "price": {
                    "currency": "USD",
                    "base_weekday_price": 1.1,
                    "base_weekend_price": 1.1,
                    "base_weekly_price": 1.1,
                    "base_minstay": 1,
                    "other": 0,
                    "tax_percent": 13.42,
                    "nightly_tax": 0,
                    "cleaning_fee": 380
                },
                "price_periods": [
                {
                    "period_start": "2018-07-10",
                    "period_end": "2018-10-31",
                    "weekday_price": 271.7,
                    "weekend_price": 392.7,
                    "weekly_price": 271.7,
                    "minstay": 4,
                    "price_period_id": "676838714",
                    "name": "Price Period 676838714"
                },
                {
                    "period_start": "2018-11-01",
                    "period_end": "2019-01-31",
                    "weekday_price": 392.7,
                    "weekend_price": 502.7,
                    "weekly_price": 392.7,
                    "minstay": 4,
                    "price_period_id": "676838715",
                    "name": "Price Period 676838715"
                },
                {
                    "period_start": "2019-02-01",
                    "period_end": "2019-09-30",
                    "weekday_price": 282.7,
                    "weekend_price": 392.7,
                    "weekly_price": 271.7,
                    "minstay": 4,
                    "price_period_id": "676838716",
                    "name": "Price Period 676838716"
                },
                {
                    "period_start": "2019-10-01",
                    "period_end": "2023-12-30",
                    "weekday_price": 271.7,
                    "weekend_price": 392.7,
                    "weekly_price": 271.7,
                    "minstay": 4,
                    "price_period_id": "676838717",
                    "name": "Price Period 676838717"
                }
                ],
                "availability": [
                {
                "period": {
                    "period_start": "2022-08-10",
                    "period_end": "2022-08-13",
                    "type": "NotAvailable"
                    }
                },
                {
                "period": {
                    "period_start": "2019-08-27",
                    "period_end": "2019-08-31",
                    "type": "NotAvailable"
                    }
                },
                {
                "period": {
                    "period_start": "2022-09-10",
                    "period_end": "2022-09-13",
                    "type": "NotAvailable"
                    }
                },
                {
                "period": {
                    "period_start": "2022-09-15",
                    "period_end": "2022-09-18",
                    "type": "NotAvailable"
                    }
                },
                {
                    "period": {
                    "period_start": "2021-08-27",
                    "period_end": "2021-08-31",
                    "type": "NotAvailable"
                    }
                },
                {
                "period": {
                    "period_start": "2022-08-27",
                    "period_end": "2022-08-31",
                    "type": "NotAvailable"
                }
                },
                {
                "period": {
                    "period_start": "2022-09-20",
                    "period_end": "2022-09-23",
                    "type": "NotAvailable"
                }
                },
                {
                    "period": {
                    "period_start": "2020-08-27",
                    "period_end": "2020-08-31",
                    "type": "NotAvailable"
                }
                }
                ],
                    "created": "2018-07-12T19:34:08.000Z",
                    "updated": "2018-11-08T03:46:01.000Z",
                "status": {
                    "published": true,
                    "bookable": true,
                    "open": true
                },
                    "photos": [],
                    "policies": [],
                    "repconfig": {}
                }
     */
    public function getListingById($listingId)
    {
        $endpoint = 'listings/' . $listingId;

        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get listing checkin/checkout
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response [
                {
                "start_date": "2018-07-10",
                "end_date": "2018-10-31",
                "check_in_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
                },
                "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
                }
                },
                {
                "start_date": "2018-11-01",
                "end_date": "2019-01-31",
                "check_in_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
                },
                "check_out_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
                }
                },
                {
                "start_date": "2019-02-01",
                "end_date": "2019-09-30",
                "check_in_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
                },
                "check_out_allowed": {
                "monday": false,
                "tuesday": false,
                "wednesday": false,
                "thursday": false,
                "friday": false,
                "saturday": false,
                "sunday": false
                }
                },
                {
                "start_date": "2019-10-01",
                "end_date": "2023-12-30",
                "check_in_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
                },
                "check_out_allowed": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
                }
                }
                ]
     */
    public function getListingCico($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/cico';


        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get checkin/checkout times
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
       @response
            {
            "check_in_start": 57600,
            "check_in_end": 57600,
            "check_out": 39600
            }
     */
    public function getListingCicoTimes($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/cicotimes';


        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * get listing content
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response
     *      [
                {
                "redawning_listing_id": 200511,
                "title": "Kapalua Bay Villa with Ocean View - Test Property",
                "description": "This gorgeous Beach Front Villa occupies the top two floors of building 21. It has two completely private master bedrooms with en-suite. Main floor master has a private lanai. Both master suites have spectacular ocean views. There are 3 bathrooms; one with soaking tub. This lovely retreat was created by a well known designer, displaying only the finest quality original art, high-end furnishings and appliances.\n\nRelax and rejuvenate. Let the warm tropical breezes and soothing sounds of the ocean transport you to a place of complete calm.\n\nIncluded are the following amenities:\nUse of Resort Pools and Tennis Courts\n\nSecure Wireless High Speed Internet\nBeach Chairs/Beach Towels\nHair Dryers/ Cozy Robes\nMid stay Towel and Linen service (for 7 or more days)\nComplimentary Local Resort Shuttle\nGreeter Service to welcome you to the island and orient you with your vacation home (on request)\nConvenient Complimentary Parking behind your villa\nThe personal attention of our on site concierge to help you plan activities, and highlight the features of the area.\nOn site manager available live 24/7 to see to your every need and ensure you and your guests are happy and comfortable.\n\nAloha....See you soon!\n\nRooms and Amenities\n\nProperty Type Villa, 2 story\nBeds 1 king bed, 1 queen bed, 1 sleeper sofa\nBathrooms 3 bathrooms\nRooms Sleeps 6, 2 bedroom 3 bath complete remodel\nFloor Area 2650 square feet\n",
                "property_type": "villa",
                "special_terms": "",
                "view": "",
                "bathrooms": 3,
                "bedrooms": 2,
                "beds_king": 1,
                "beds_queen": 1,
                "beds_double": 0,
                "beds_twin": 0,
                "beds_sofa": 1,
                "beds_bunk": 0,
                "beds_air_mattress": 0,
                "kitchen": "none",
                "pool": 0,
                "children_ok": "yes",
                "room_configurations_id": null,
                "sleep_max": null,
                "pets_allowed": 0,
                "smoking_allowed": 0,
                "amenities": "[]",
                "location": "{\"address\":{\"street_address\":\"500 Bay Drive\",\"street_address2\":\"Unit #21B2\",\"city\":\"Kapalua\",\"province\":\"HI\",\"postal_code\":\"96761\",\"country\":\"us\"},\"geo_code\":{\"lat\":0,\"lng\":0}}",
                "handicap_accessible": 0,
                "square_feet": 2650,
                "created_at": "2018-11-12 16:43:46",
                "updated_at": "2018-11-12 16:43:46"
                }
            ]
     */
    public function getListingContent($listingId)
    {
        $listings = RAContent::where('redawning_listing_id', $listingId)->get();

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($listings));
    }

    /**
     * get listing policies
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     * @response  [
                {
                    "name": "[C] FREE CANCEL 60 - MANAGER",
                    "description": "C. Free Cancellation 60: 50% deposit refundable until 60, 50% balance charged at 60 non-refundable.",
                    "offset_in_days": 1,
                    "operator": "<=",
                    "from_date": "booking",
                    "value": 0,
                    "value_type": "percent",
                    "fee_type": "clean_fee",
                    "policy_type": "cancellation"
                }
     *      ]
     */
    public function getListingPolicies($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/policies';

        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get listing summaries
     * @group RedAwning
     * @param Request $request
     * @return responseProvider
     * @bodyParam page integer required Number of pages returned
     * @bodyParam limit string required Page limit
     * @bodyParam index  string required 1 for api results, 0 for db result
     * @response [
                    {
                        "listing_id": 200508,
                        "title": "Chophouse Row - Test Property"
                    },
                    {
                        "listing_id": 200510,
                        "title": "Park City Woodside Ski Estate Test Property  "
                    }
                ]
     */
    public function getListingSummaries(Request $request)
    {
        $page = $request->get('page');
        $limit = $request->get('limit');
        $index = $request->get('index'); //1 for showing listings straight from the api

        if (isset($index) && $index == 1) {
            //1 for showing listings straight from the api


            $request_headers = array();
            $request_headers[] = 'x-api-key: ' . env('RedAwningPub');

            $client = new Client();
            $response = $client->get($this->url . 'listing-summaries', [
                'headers' => $request_headers
            ]);

            $listings = $response->getBody();

        } else {

            $this->_limit = $limit;
            $this->_page = $page;

            if (!isset($this->_limit) || !isset($this->_page))
            {
                $ResponseServiceProvider = new ResponseProvider();
                return $ResponseServiceProvider->preferredFormat('{"status" ; "failed"}');
            }

            if ($this->_limit == 'all') {

                $listings = DB::table('redawning_listings')
                    ->join('redawning_content', 'redawning_listings.listing_id', 'redawning_content.redawning_listing_id')
                    ->whereJsonContains('status->published', true)
                    ->select('listing_id', 'title')
                    ->get();
                $listings = json_decode($listings, true);

            } else {
                $listings = DB::table('redawning_listings')
                    ->join('redawning_content', 'redawning_listings.listing_id', 'redawning_content.redawning_listing_id')
                    ->whereJsonContains('status->published', true)
                    ->select('listing_id', 'title')
                    ->offset((($this->_page - 1) * $this->_limit))
                    ->limit($this->_limit)
                    ->get();

            }
        }

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($listings));
    }

    /**
     * get quote
     * @group RedAwning
     * @param $listingId
     * @param $fromDate
     * @param $toDate
     * @return responseProvider
     * @response {
            "quote_id": "19102",
            "listing_id": "200508",
            "quote_expiration": 1542046829,
            "num_adults": 1,
            "num_children": 0,
            "currency": "USD",
            "checkin_date": "2030-06-08",
            "checkout_date": "2030-06-15",
            "travel_insurance": 0,
            "deposit_percent": null,
            "min_stay": 0,
            "status": "success",
            "rental_price": 1548,
            "cleaning_fee": 377,
            "tax": 200.75
            }
     */
    public function getQuote($listingId, $fromDate, $toDate)
    {
        // Send an asynchronous request.
        $endpoint = 'listings/' . $listingId . '/quote?checkin=' . $fromDate . '&checkout=' . $toDate;

        $client = new Client();
        $response = $client->get($this->url . '/' . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * post new reservation
     * @group RedAwning
     * @param Request $request
     * @return responseProvider
     * @response {
     *      "listing_id": "200508",
     *      "reservation_id": "49936",
     *      "property_title": "Chophouse Row - Test Property",
     *      "checkin_date": "2030-06-08",
     *      "checkout_date": "2030-06-15",
     *      "book_date": "2018-11-12",
     *      "status": "Confirmed",
     *      "adults": 1,
     *      "children": 0,
     *      "email": "dev@redawning.com",
     *      "first_name": "Test",
     *      "last_name": "McTesterson",
     *      "address": {
     *          "street_address": "1234 S Testing St.",
     *          "city": "Des Moines",
     *          "province": "WA",
     *          "postal_code": "98198",
     *          "country": "US"
     *      },
     *      "phone": "206-555-1212",
     *      "cellphone": "206-555-1111",
     *      "channel_reservation_id": "",
     *      "price": {
     *          "rental_price": 1548.0,
     *          "cleaning_fee": 354.0,
     *          "tax": 209.22,
     *          "currency":
     *          "USD"
     *      }
     * }
     *
     * @bodyParam quote_id integer required The quote ID.
     * @bodyParam first_name string required The first name
     * @bodyParam last_name string required The last name
       @bodyParam address array required
     * ["street_address": "1234 S Testing St.", "city": "Des Moines", "province": "WA", "postal_code": "98198", "country": "US"]
     * @bodyParam home_phone string required The home phone number.
     * @bodyParam mobile_phone string required The mobile phone number.
     * @bodyParam email string required The email address.
     * @bodyParam payments array required
     * [{"method": "creditcard", "method_details": { "creditcard_number": "4111111111111111", "cvv": "123", "expiration_month": 8, "expiration_year": 2020},"amount": 1977.95,"currency": "USD"}]
     */
    public function getNewReservation(Request $request)
    {
        $url = $this->url . 'reservations';
        $data_string = $request->all();

        $ch = curl_init( $url );
        $payload = json_encode( $data_string);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'x-api-key: zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($result);

    }

    /**
     * get reservations
     * @group RedAwning
     * @param Request $request
     * @return string
     * @response [
            {
            "listing_id": "200508",
            "reservation_id": "49856",
            "property_title": "Chophouse Row - Test Property",
            "checkin_date": "2030-04-02",
            "checkout_date": "2030-04-08",
            "book_date": "2018-11-08",
            "status": "Cancelled",
            "adults": 1,
            "children": 0,
            "email": "dev@redawning.com",
            "first_name": "Test",
            "last_name": "McTesterson",
            "address": {
            "street_address": "1234 S Testing St.",
            "city": "Des Moines",
            "province": "WA",
            "postal_code": "98198",
            "country": "US"
            },
            "phone": "206-555-1212",
            "cellphone": "206-555-1111",
            "channel_reservation_id": "",
            "price": {
            "rental_price": 1498,
            "cleaning_fee": 354,
            "tax": 203.72,
            "currency": ""
            }
    }]
     *
     */
    public function getReservations(Request $request)
    {
        $checkin = $request->get('checkin');
        $limit = $request->get('limit');
        $offset = $request->get('offset'); //1 for showing listings straight from the api
        $tid = rand(1000, 10);

        $url = $this->url . 'reservations?limit=' . $limit . '&offset=' . $offset . '&tid=' . $tid . '&checkin=' . $checkin;

        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * get reservation by id
     * @group RedAwning
     * @param $reservationId
     * @return responseProvider
     * @response {
            "listing_id": "200508",
            "reservation_id": "49856",
            "property_title": "Chophouse Row - Test Property",
            "checkin_date": "2030-04-02",
            "checkout_date": "2030-04-08",
            "book_date": "2018-11-08",
            "status": "Cancelled",
            "adults": 1,
            "children": 0,
            "email": "dev@redawning.com",
            "first_name": "Test",
            "last_name": "McTesterson",
            "address": {
            "street_address": "1234 S Testing St.",
            "city": "Des Moines",
            "province": "WA",
            "postal_code": "98198",
            "country": "US"
            },
            "phone": "206-555-1212",
            "cellphone": "206-555-1111",
            "channel_reservation_id": "",
            "price": {
            "rental_price": 1498,
            "cleaning_fee": 354,
            "tax": 203.72,
            "currency": ""
            }
         }
     */
    public function getReservationById($reservationId)
    {
        $url = $this->url . 'reservations/' . $reservationId;
        $client = new Client();
        $response = $client->get($url, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * delete  reservation by id
     * @group RedAwning
     * @param $reservationId
     * @return responseProvider
     * @response {
            "reservation_id": "49856",
            "effective_policies": []
            }
     */
    public function deleteReservationById($reservationId)
    {
        $url = $this->url . 'reservations/' . $reservationId;
        $client = new Client();
        $response = $client->delete($url, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    /**
     * get reservation status
     * @group RedAwning
     * @param $reservationId
     * @return responseProvider
     * @response {
            "reservation_id": "49856",
            "effective_policies": []
            }
     */
    public function getReservationStatus($reservationId)
    {

        $client = new Client();
        $response = $client->get($this->url . 'reservationstatus/' . $reservationId, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());
    }

    /**
     * get listing price
     * @group RedAwning
     * @param $listingId
     * @return responseProvider
     *
     * @response {
    "price": {
    "currency": "USD",
    "base_weekday_price": 100,
    "base_weekend_price": 150,
    "base_weekly_price": 100,
    "base_minstay": 2,
    "cleaning_fee": 150,
    "other": 0,
    "tax_percent": 10
    },
    "price_periods": [
    {
    "period_start": "2017-01-01",
    "period_end": "2017-12-31",
    "weekday_price": 102,
    "weekend_price": 151,
    "weekly_price": 620,
    "minstay": 2,
    "price_period_id": "371711549"
    }
    ]
    }
     */
    public function getListingPrice($listingId)
    {
        $endpoint = '/listings/' . $listingId . '/price';

        $client = new Client();
        $response = $client->get($this->url . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $ResponseServiceProvider = new ResponseProvider();

        return $ResponseServiceProvider->preferredFormat($response->getBody());


    }


}

//TODO set up deployer
//TODO fix room config table
