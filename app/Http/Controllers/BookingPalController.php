<?php

namespace App\Http\Controllers;

use App\Helper;
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * XML feed of all MBP products
     */
    public function getAllProducts($type) //api/v1/products
    {

        $pos = env('MyBookingPalPOS', true);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
        $url = env('MyBookingPalURL', true).'product/list/channel/' . $type . '?pos=' . $pos;

        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $formatter = Formatter::make($response->getBody(), Formatter::JSON);

            header("Content-type: text/xml");
            echo $formatter->toXml();
        });
        $promise->wait();
    }


    /**
     * Gets MBP product id by name
     * @param $name
     * @return mixed
     */
    public function getProductIDByName($name) //api/products/name/{name}
    {
        $pos = env('MyBookingPalPOS', true);

        $url = env('MyBookingPalURL', true).'product/list/channel/Accommodation?pos=' . $pos;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, []);

        $properties = json_decode($response->getBody());

        $i = 0;
        foreach ($properties->items_response->items->item as $row) {
            if ($row->name == urldecode($name)) {
                $formatter = Formatter::make($row->id, Formatter::JSON);
                return $formatter->toXml();
            }
            $i++;
        }
    }

    /**
     * gets MBP property details
     * @param $productId
     */
    public function getPropertyDetails($productId)
    {
        $pos = env('MyBookingPalPOS', true);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
        $url = env('MyBookingPalURL', true).'product/' . $productId . '/propertydetail?pos=' . $pos . '&currency=USD';

        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $output = json_decode($response->getBody(), true);

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            $this->array_to_xml($output, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();

        });
        $promise->wait();
    }

    /**
     * gets MBP property summary
     * @param $productId
     */
    public function getPropertySummary($productId)
    {
        $pos = env('MyBookingPalPOS', true);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
        $url = env('MyBookingPalURL', true).'product/' . $productId . '/propertydetail?pos=' . $pos . '&currency=USD';

        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $output = json_decode($response->getBody(), true);

            $property = $output['property_response']['property'];

            $summary = [
                'id' => $property['id'],
                'name' => $property['name'],
                'physicaladdress' => $property['physicaladdress'],
                'city' => $property['city'],
                'region' => $property['region'],
                'latitude' => $property['latitude'],
                'longitude' => $property['longitude'],
                'bedroom' => $property['bedroom'],
                'bathroom' => $property['bathroom'],
                'sleeps' => $property['person'],
                'description' => $property['description'],
                'image' => $property['images']['image'][1],
                'thumbnail' => $property['images']['thumbnail'][1],
            ];

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            $this->array_to_xml($summary, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();

        });
        $promise->wait();
    }

    /**
     * gets MBP quote
     * @param $productId
     * @param $fromDate
     * @param $toDate
     */
    public function getQuote($productId, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
        $url = env('MyBookingPalURL', true).'reservation/quotes?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';


        echo $url; exit;

        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $output = json_decode($response->getBody(), true);

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            $this->array_to_xml($output, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();

        });
        $promise->wait();
    }

    /**
     * get MBP prices
     * @param $productId
     * @param $fromDate
     * @param $toDate
     */
    public function getPrices($productId, $fromDate, $toDate)
    {
        $pos = env('MyBookingPalPOS', true);

        $client = new \GuzzleHttp\Client();

        // Send an asynchronous request.
        $url = env('MyBookingPalURL', true).'reservation/prices?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate . '&currency=USD';
        echo $url; exit;
        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $output = json_decode($response->getBody(), true);

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            $this->array_to_xml($output, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();

        });
        $promise->wait();
    }


    /**
     * gets MBP availability
     * @param $productId
     * @param $fromDate
     * @param $toDate
     */
    public function getAvailability($productId, $fromDate, $toDate)
    {

        $pos = env('MyBookingPalPOS', true);

        $client = new Client();

        $url = env('MyBookingPalURL', true).'reservation/available_calendar?pos=' . $pos . '&productid=' . $productId . '&fromdate=' . $fromDate . '&todate=' . $toDate;

        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) {

            $output = json_decode($response->getBody(), true);

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            $this->array_to_xml($output, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();


        });
        $promise->wait();
    }


    /**
     * creates a MBP booking
     * @param Request $request
     */
    public function createBooking(Request $request)
    {
        if ($request->isMethod('post')) {

            $post = $request->all();

            $url = env('MyBookingPalURL', true).'reservation/payment/create';

//            echo $
//            exit;url;

            $client = new \GuzzleHttp\Client();

            $request = $client->post($url, [
                'json' => $post
            ]);

            $output = json_decode($request->getBody(), true);

            print_r(json_decode($request->getBody()));

            // creating object of SimpleXMLElement
            $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

            // function call to convert array to xml
            Helper::array_to_xml($output, $xml_data);

            header("Content-type: text/xml");

            print $xml_data->asXML();

        }


    }

}
