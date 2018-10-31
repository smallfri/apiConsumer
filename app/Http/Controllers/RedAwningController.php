<?php

namespace App\Http\Controllers;

use App\RAAvailability;
use App\RAContent;
use App\RAListing;
use App\RACico;
use App\RAPhoto;
use App\RAPricePeriod;
use App\RARoomConfiguration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use SimpleXMLElement;
use SoapBox\Formatter\Formatter;

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
        $request_headers[] = 'x-api-key: '.env('RedAwningPubKey');

        // Performing the HTTP request
        $ch = curl_init($this->url.$endpoint);

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

            $ch = curl_init($this->url.'/'.$endpoint.'?limit=' . $limit . '&offset=' . $offset . '&tid=' . $random);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            curl_close($ch);

            $listings = json_decode($response, true);

            foreach ($listings AS $listing) {

                $Listing = new RAListing();
                $Listing->listing_id = $listing['listing_id'];
                $Listing->url_alias = $listing['url_alias'];
                $Listing->created = $listing['created']; //object
                $Listing->updated = $listing['updated']; //object
                $Listing->cico_times = json_encode($listing['cico_times']); //object
                $Listing->price = json_encode($listing['price']); //object
                $Listing->status = json_encode($listing['status']); //object
                $Listing->photos = json_encode($listing['photos']); //object
                $Listing->policies = json_encode($listing['policies']); //object
                $Listing->repconfig = json_encode($listing['repconfig']); //object
                $Listing->save();

                $Content = new RAContent();
                $Content->redawning_listing_id = $listing['listing_id'];
                $Content->title = $listing['content']['title'];
                $Content->description = $listing['content']['description'];
                $Content->property_type = $listing['content']['property_type'];
                $Content->special_terms = $listing['content']['special_terms'];
                $Content->view = $listing['content']['view'];
                $Content->bathrooms = $listing['content']['bathrooms'];
                $Content->bedrooms = $listing['content']['bedrooms'];
                $Content->beds_king = $listing['content']['beds_king'];
                $Content->beds_queen = $listing['content']['beds_queen'];
                $Content->beds_double = $listing['content']['beds_double'];
                $Content->beds_twin = $listing['content']['beds_twin'];
                $Content->beds_sofa = $listing['content']['beds_sofa'];
                $Content->beds_bunk = $listing['content']['beds_bunk'];
                $Content->beds_air_mattress = $listing['content']['beds_air_mattress'];
                $Content->kitchen = $listing['content']['kitchen'];
                $Content->pool = $listing['content']['pool'];
                $Content->children_ok = $listing['content']['children_ok'];
                $Content->pets_allowed = $listing['content']['pets_allowed'];
                $Content->smoking_allowed = $listing['content']['smoking_allowed'];
                $Content->amenities = json_encode($listing['content']['amenities']);
                $Content->location = json_encode($listing['content']['location']);
                $Content->handicap_accessible = $listing['content']['handicap_accessible'];
                $Content->square_feet = $listing['content']['square_feet'];
                $Content->save();

                foreach($listing['content']['room_configurations'] AS $photo)
                {
                        $RoomConfig = new RARoomConfiguration();
                        $RoomConfig->name = $photo['name'];
                        $RoomConfig->beds = json_encode($photo['beds']);
                        $RoomConfig->save();
                }

                foreach($listing['content']['photos'] AS $photo)
                {
                    $Photo = new RAPhoto();
                    $Photo->redawning_listing_id = $listing['listing_id'];
                    $Photo->url = $photo['url'];
                    $Photo->tags = json_encode($photo['tags']);
                    $Photo->title = $photo['title'];
                    $Photo->width = $photo['width'];
                    $Photo->height = $photo['height'];
                    $Photo->timestamp = $photo['timestamp'];
                    $Photo->save();
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

                foreach($listing['price_periods'] as $price_period)
                {
                    $Price = new RAPricePeriod();
                    $Price->redawning_listing_id = $listing['listing_id'];
                    $Price->period_start = $price_period['period_start'];
                    $Price->period_end = $price_period['period_end'];
                    $Price->weekday_price = $price_period['weekday_price'];
                    $Price->weekend_price = $price_period['weekend_price'];
                    $Price->weekly_price = $price_period['weekly_price'];
                    $Price->minstay = $price_period['minstay'];
                    $Price->name = $price_period['name'];
                    $Price->save();
                }

                foreach($listing['availability'] as $price_period)
                {
                    $Price = new RAAvailability();
                    $Price->redawning_listing_id = $listing['listing_id'];
                    $Price->period = json_encode($price_period['period']);
                    $Price->save();
                }



            }
        }

        return true;
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

    public function array_to_xml($data, &$xml_data)
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
