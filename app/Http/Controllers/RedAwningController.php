<?php

namespace App\Http\Controllers;

use App\RAAvailability;
use App\RAContent;
use App\RAListing;
use App\RACico;
use App\RAPhoto;
use App\RAPricePeriod;
use App\RARoomConfiguration;

/**
 * Class RedAwningController
 * @package App\Http\Controllers
 */
class RedAwningController extends Controller
{
    public $url;

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


    public function listings()
    {
        return $this->absorbListings('listings');
    }

    public function changes()
    {
        return $this->absorbListings('changes');
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

    public
    function array_to_xml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }


}
