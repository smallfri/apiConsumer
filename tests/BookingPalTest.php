<?php

use Carbon\Carbon;

class BookingPalTest extends TestCase
{

public function testLocationsList()
{

    parent::setUp();

    $type = 'Accommodation';

    $url = env('MyTestURL', true) . '/bookingPal/locations/'.$type.'/list';

    $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
        ->seeJson([
            'id' => '291355',
        ]);
}

    public function testSearchLocations(){

        parent::setUp();

        $term = 'Paris';

        $url = env('MyTestURL', true).'/bookingPal/locations/search/'.$term;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'ID' => '21980',
            ]);
    }

    public function testSearchRelatedLocations(){
        parent::setUp();

        $term = 'Paris';

        $url = env('MyTestURL', true).'/bookingPal/locations/search/related/'.$term;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'locations' => [],
            ]);
    }

    public function testLocationsCheck()
    {

        parent::setUp();

        $location = 'Paris';

        $url = env('MyTestURL', true) . '/bookingPal/locations/check/' . $location;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'ID' => '21980',
            ]);
    }


    public function testLocationPolicies(){

        parent::setUp();

        $locationID = '291355';

        $url = env('MyTestURL', true).'/bookingPal/units/'.$locationID.'/policies/channel';

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'ID' => '21980',
            ]);
    }

    public function testLocationRoomInfo(){

        parent::setUp();

        $locationID = '291355';

        $url = env('MyTestURL', true).'/bookingPal/locations/'.$locationID.'/room/info';

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'ID' => '21980',
            ]);
    }

    public function testPropertyDetails()
    {

        parent::setUp();

        $locationID = '291355';

        $url = env('MyTestURL', true) . '/bookingPal/property/details/' . $locationID;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'city' => 'Seacrest',
            ]);
    }

public function testLocationPrices()
    {

        parent::setUp();

        $locationID = '291358';
        $fromDate = '2019-07-20';
        $toDate = '2019-07-27';

        $url = env('MyTestURL', true) . '/bookingPal/locations/'.$locationID.'/prices/from_date/'.$fromDate.'/to_date/'.$toDate;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'week' => 23,
            ]);
    }

    public function testLocationQuotes()
    {

        parent::setUp();

        $locationID = '291358';
        $fromDate = '2019-07-20';
        $toDate = '2019-07-27';

        $url = env('MyTestURL', true) . '/bookingPal/locations/'.$locationID.'/quotes/from_date/'.$fromDate.'/to_date/'.$toDate;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'agentCommission' => 0.0005,
            ]);
    }

    public function testAvailabilityCalendar()
    {

        parent::setUp();

        $locationID = '291358';
        $fromDate = '2019-07-20';
        $toDate = '2019-07-27';

        $url = env('MyTestURL', true) . '/bookingPal/locations/'.$locationID.'/availability/from_date/'.$fromDate.'/to_date/'.$toDate;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'endDate' => '2019-07-27',
            ]);
    }

    public function testReservationPrices()
    {

        parent::setUp();

        $locationID = '291358';
        $fromDate = '2019-07-20';
        $toDate = '2019-07-27';

        $url = env('MyTestURL', true) . '/bookingPal/locations/'.$locationID.'/reservation/prices/from_date/'.$fromDate.'/to_date/'.$toDate;

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'propertyId' => 291358,
            ]);
    }

    public function testBookProperty()
    {

        parent::setUp();

        $url = env('MyTestURL', true) . '/bookingPal/booking/create';

        $fromDate = Carbon::today()->toDateString();
        $toDate = Carbon::today()->addDay(7)->toDateString();

        $pos = env('MyBookingPalPOS', true);
        $data = '{"reservation":{"pos":"6617607049f98025ce4fdc050602ac63","productid":291358,"fromdate":"2019-06-21","todate":"2019-06-28","currency":"USD","adult":2,"child":0,"emailaddress":"qwe@qwe.com","familyname":"qwe","firstname":"qwe","cardnumber":4111111111111111,"cardmonth":4,"cardyear":2022,"amount":3577.68,"telnumber":123123123,"cardtype":1,"notes":"test","cc_security_code":123,"cc_address":123,"cc_country":"AZ","cc_state":null,"cc_zip":123,"cc_city":123,"cc_bdm":12,"cc_bdd":12,"cc_bdy":12}}';

        $reservation = json_decode( $this->json('POST', $url, json_decode($data,true), ['Accept' => 'application/json'])->seeStatusCode(200)->seeJson(['message'=>'Product 291358 is not available for dates 2019-06-21 - 2019-06-28.'])
            ->response->content(),true);

      $reservationID= $reservation['reservation_response']['reservation']['id'];

            $this->CancelProperty($reservationID);
    }

    public function CancelProperty($reservationID)
    {

        parent::setUp();

        $reason =5;
        $amount = 3577.68;

        $url = env('MyTestURL', true) . '/bookingPal/booking/'.$reservationID.'/reason/'.$reason.'/amount/'.$amount.'/cancel';

        $this->json('GET', $url, [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'is_error' => false
            ]);
    }

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
