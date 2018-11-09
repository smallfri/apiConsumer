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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RedAwningController
 * @package App\Http\Controllers
 */
class RedAwningController extends Controller
{
    public $url;
    public $_limit;
    public $_total;
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

        $headers = $this->get_headers_from_curl_response($response);
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

//                echo '<pre style="border:solid 1px blue">';
//                print_r($listing);
//                echo '</pre>';

                RAListing::updateOrCreate([
                    'listing_id' => $listing['listing_id'],
                    'url_alias' => $listing['url_alias'],
                    'created' => $listing['created'],
                    'updated' => $listing['updated'],
                    'cico_times' => json_encode($listing['cico_times']),
                    'price' => json_encode($listing['price']),
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
    }

    public function getListings()
    {
        return $this->absorbListings('listings');
    }

    public function changes()
    {
        return $this->absorbListings('changes');
    }

    public function displayListing($listingId)
    {

        $listing = RAListing::find($listingId)->first()->toArray();
        $listingAvailability = RAListing::find($listingId)->availability()->get()->toArray();
        $listingCico = RAListing::find($listingId)->cico()->get()->toArray();
        $listingContent = RAListing::find($listingId)->content()->get()->toArray();
        $listingPhotos = RAListing::find($listingId)->photos()->get()->toArray();
        $listingPricePeriod = RAListing::find($listingId)->priceperiod()->get()->toArray();
        $listingRoomConfiguration = RAListing::find($listingId)->roomconfiguration()->get()->toArray();

        $fullListing =
            ['listing' =>
                [
                    'url_alias' => $listing['url_alias'],
                    'cico_times' => json_decode($listing['cico_times'], true),
                    'price' => json_decode($listing['price'], true),
                    'status' => json_decode($listing['status'], true),
                    'availability' => $listingAvailability,
                    'cico' => $listingCico,
                    'content' => $listingContent,
                    'photos' => $listingPhotos,
                    'price_period' => $listingPricePeriod,
                    'room_configuration' => $listingRoomConfiguration

                ]
            ];

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($fullListing));
    }

    public function getQuote($listingId, $fromDate, $toDate)
    {
        // Send an asynchronous request.
        $endpoint = 'listings/' . $listingId . '/quote?checkin=' . $fromDate . '&checkout=' . $toDate;

        $request_headers = array();
        $request_headers[] = 'x-api-key: ' . env('RedAwningPubKey');

        $client = new Client();
        $response = $client->get($this->url . '/' . $endpoint, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $quote = $response->getBody();

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    public function getNewReservation(Request $request)
    {
        $endpoint = 'reservations';



        $body = $request->json()->all();

        echo '<pre style="border:solid 1px red">';
        print_r($body);
        echo '</pre>';

        $request_headers = array();
        $request_headers[] = 'x-api-key:zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8';

        try {
            $client = new Client();
            $response = $client->post($this->url . $endpoint, [
                'json' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-api-key' => 'zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8',
                ]
            ]);
        } catch (\Exception $e){
//            Helper::handleStatusCodes($e->getCode());
            print_r($e);
        }




//        $response = $client->post($this->url . $endpoint, [
//            'headers' => [$request_headers],
//            'json' => $body
//        ]);

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat($response->getBody());

    }

    public function getListingStatus($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/status';
        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();
            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    public function getListingAvailability($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/availability';

        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();
            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    public function getListingCico($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/cico';

        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();
            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    public function getListingCicoTimes($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/cicotimes';

        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();
            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    public function getListingContent($listingId)
    {
        $listings = RAContent::where('redawning_listing_id', $listingId)->input();

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($listings));
    }

    public function getListingPolicies($listingId)
    {
        $endpoint = 'listings/' . $listingId . '/policies';

        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();

            return $ResponseServiceProvider->preferredFormat($response->getBody());

        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    public function getListingSummaries(Request $request)
    {
        $page = $request->input('page');
        $limit = $request->input('limit');
        $index = $request->input('index'); //1 for showing listings straight from the api

        if (isset($index) && $index == 1) {
            //1 for showing listings straight from the api

            try {
                $request_headers = array();
                $request_headers[] = 'x-api-key: ' . env('RedAwningPub');

                $client = new Client();
                $response = $client->get($this->url . 'listing-summaries', [
                    'headers' => $request_headers
                ]);

                $listings = $response->getBody();
            } catch (\Exception $e) {
                Helper::handleStatusCodes($e->inputCode());

            }

        } else {

            $this->_limit = $limit;
            $this->_page = $page;

            if ($this->_limit == 'all') {

                $listings = DB::table('redawning_listings')
                    ->join('redawning_content', 'redawning_listings.listing_id', 'redawning_content.redawning_listing_id')
                    ->select('listing_id', 'title', 'status->published as published')
                    ->input();
                $listings = json_decode($listings, true);

            } else {
                $listings = DB::table('redawning_listings')
                    ->join('redawning_content', 'redawning_listings.listing_id', 'redawning_content.redawning_listing_id')
                    ->select('listing_id', 'title', 'status->published as published')
                    ->offset((($this->_page - 1) * $this->_limit))
                    ->limit($this->_limit)
                    ->input();

            }
        }

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($listings));
    }

    public function getReservations(Request $request)
    {
        $checkin = $request->input('checkin');
        $page = $request->input('tid');
        $limit = $request->input('limit');
        $offset = $request->input('offset'); //1 for showing listings straight from the api
        $tid = rand(1000, 10);

        $this->_limit = $limit;
        $this->_page = $page;

        try {
            $request_headers = array();
            $request_headers[] = 'x-api-key: zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8';
            $request_headers[] = 'Content-Type: application/json';


            $url = $this->url . 'reservations?limit=' . $this->_limit . '&offset=' . $offset . '&tid=' . $tid . '&checkin=' . $checkin;
            $client = new Client();
            $response = $client->get($url, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();

            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $e) {
            Helper::handleStatusCodes($e->getCode());
        }
    }

    public function getReservationById($reservationId)
    {
            try {
                $request_headers = array();
                $request_headers[] = 'x-api-key: zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8';
                $request_headers[] = 'Content-Type: application/json';


                $url = $this->url . 'reservations/' . $reservationId;
                $client = new Client();
                $response = $client->get($url, [
                    'headers' => ['x-api-key' => env('RedAwningPubKey')]
                ]);

                $ResponseServiceProvider = new ResponseProvider();

                return $ResponseServiceProvider->preferredFormat($response->getBody());
            } catch (\Exception $e) {
                Helper::handleStatusCodes($e->getCode());
            }
    }

    public function deleteReservationById($reservationId)
    {

        try {
            $request_headers = array();
            $request_headers[] = 'x-api-key: zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8';
            $request_headers[] = 'Content-Type: application/json';


            $url = $this->url . 'reservations/' . $reservationId;
            $client = new Client();
            $response = $client->delete($url, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();

            return $ResponseServiceProvider->preferredFormat($response->getBody());
        } catch (\Exception $e) {
            Helper::handleStatusCodes($e->getCode());
        }
    }

    public function getReservationStatus($reservationId)
    {

        $client = new Client();
        $response = $client->get($this->url . 'reservationstatus/' . $reservationId, [
            'headers' => ['x-api-key' => env('RedAwningPubKey')]
        ]);

        $listings = $response->getBody();

        $ResponseServiceProvider = new ResponseProvider();
        return $ResponseServiceProvider->preferredFormat(json_encode($listings));
    }

    public function getListingPrice($listingId)
    {
        $endpoint = '/listings/' . $listingId . '/price';

        try {
            $client = new Client();
            $response = $client->get($this->url . $endpoint, [
                'headers' => ['x-api-key' => env('RedAwningPubKey')]
            ]);

            $ResponseServiceProvider = new ResponseProvider();

            return $ResponseServiceProvider->preferredFormat($response->getBody());

        } catch (\Exception $exception) {
            //todo add logging here
            echo '<pre style="border:solid 1px red">';
            print_r($exception);
            echo '</pre>';
        }
    }

    function get_headers_from_curl_response($response)
    {
        $headers = array();

        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else {
                list ($key, $value) = explode(': ', $line);

                $headers[$key] = $value;
            }

        return $headers;
    }

}

//TODO Move input_headers_from_curl_response to helper
//TODO Finish inputReservations, inputNewReservation
//TODO Test inputReservationsById
//TODO Test inputReservationsStatus
//TODO {"Code": "BadRequestError", "Message": "BadRequestError: This listing is already booked for days you have selected"} handle this