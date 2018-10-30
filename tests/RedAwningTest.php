<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RedAwningTest extends TestCase
{
//    public function testListings()
//    {
//        parent::setUp();
//
//        $command =<<<END
//Test/Verify - get listings
//END;
//
//        /*********Here we curl our endpoint and save data as $returned********/
//
//        $url = 'http://homestead.test/api/v1/redAwning/listings';
//
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_POST, FALSE);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//            "Content-Type: application/xml"
//        ));
//
//        $returned = curl_exec($ch);
//        curl_close($ch);
//
//
//        $xml = simplexml_load_string($returned);
//        $returned = json_encode($xml);
//
//
//
//
//        /*********Here we curl our RedAwnings endpoint and save data as $actual********/
//
//
//        // Setting the HTTP Request Headers
//        $request_headers = array();
//        $request_headers[] = 'x-api-key: zj4xYmGHwO6j04Umhs8Ve16HNoIvMEP6u0PLcUU8';
//
//
//        // Performing the HTTP request
//        $ch = curl_init('https://test.api.redawning.com/v1/listings');
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//
//        $actual = curl_exec($ch);
//        curl_close($ch);
//
//        print_r($actual);
//
//        exit;
//        $this->assertJsonStringEqualsJsonString($actual,$returned);
//
//
//
//
//
//exit;
//
//        //Find the product message code
//        $re = '/<messageCode>(.*)<\/messageCode>/m';
//
//        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
//        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);
//
//        //Make sure product message code matches the one in the response
//        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
//        $this->assertEquals('<message>This property requires a minimum 1-night stay.</message>', $matches2[0][0]);
//
//        $test_data = <<<END
//
//        $args = [
//            'command' => $command,
//            'url' => $url,
//            'product_id' => $product_id,
//            'expected' => $test_data,
//            'actual' => $response,
//            'data' => 'that is NOT allowed - reservation creation should not be allowed',
//        ];
//
//        $this->writeToLog($args);
//
//    }


    public function writeToLog($args)
    {
        $log = new \App\Logs;
        $log->command = $args['command'];
        $log->url = $args['url'];
        $log->product_id = $args['product_id'];
        $log->expected = $args['expected'];
        $log->actual = $args['actual'];
        $log->data = strip_tags($args['data']);
        $log->save();

    }
}
