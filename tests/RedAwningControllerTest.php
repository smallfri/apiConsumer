<?php
namespace Tests;

use TestCase;

class RedAwningControllerTest extends TestCase
{
    public function testListingPrice()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/price', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'base_minstay' => 1,
            ]);
    }

    public function testListingStatus()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/status', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'bookable' => true,
            ]);
    }

    public function testListingAvailability()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/availability', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'period_start' => '2019-02-05',
            ]);
    }

    public function testListingCico()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/cico', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'start_date' => '2018-07-12',
            ]);
    }

    public function testListingContent()
    {
        return $this->markTestSkipped(); //TODO fix
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200508/content', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'start_date' => '2018-07-12',
            ]);
    }

    public function testListingCicotimes()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/cicotimes', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'check_in_start' => 57600,
            ]);
    }
    public function testListingPolicies()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/69395/policies', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'name' => '[C] FREE CANCEL 60 - MANAGER',
            ]);
    }

    public function testListingReservations()
    {
        return $this->markTestSkipped(); //TODO fix
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/reservations', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'name' => '[C] FREE CANCEL 60 - MANAGER',
            ]);
    }

    public function testListingQuote()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/quote/200510/from_date/2020-08-27/to_date/2020-09-17', [], ['Accept'=>'application/json'])->seeStatusCode(200)
            ->seeJson([
                'checkin_date' => '2020-08-27',
            ]);
    }
}