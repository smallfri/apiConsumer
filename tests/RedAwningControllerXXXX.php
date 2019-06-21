<?php

namespace Tests;

use TestCase;
return;
class RedAwningControllerXXXX extends TestCase
{
    public function testListingPrice()
    {
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/price', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'base_minstay' => 1,
            ]);
    }

    public function testListingStatus()
    {
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/status', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'bookable' => true,
            ]);
    }

    public function testListingAvailability()
    {
        return $this->markTestSkipped(); //TODO fix

        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/availability', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'period_start' => '2019-02-05',
            ]);
    }

    public function testListingCico()
    {
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/cico', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'start_date' => '2018-07-12',
            ]);
    }

    public function testListingContent()
    {
        return $this->markTestSkipped(); //TODO fix
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200508/content', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'start_date' => '2018-07-12',
            ]);
    }

    public function testListingCicotimes()
    {
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/cicotimes', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'check_in_start' => 57600,
            ]);
    }

    public function testListingPolicies()
    {
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/69395/policies', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'name' => '[C] FREE CANCEL 60 - MANAGER',
            ]);
    }

    public function testListingReservations()
    {
        return $this->markTestSkipped(); //TODO fix
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/reservations', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'name' => '[C] FREE CANCEL 60 - MANAGER',
            ]);
    }

    public function testListingQuote()
    {
        return $this->markTestSkipped(); //TODO fix

        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/quote/200510/from_date/2020-08-27/to_date/2020-09-17', [], ['Accept' => 'application/json'])->seeStatusCode(200)
            ->seeJson([
                'checkin_date' => '2020-08-27',
            ]);
    }

    public function testListingPropertyDetail()
    {
        $this->markTestSkipped(); //TODO fix
        $this->json('GET', 'https://www.condo-world-engine.com/api/1.0.0/redAwning/listings/200518/property_details')->seeStatusCode(200)
            ->seeJson([
                'url_alias' => 'rental-property/chophouse-row-test-property-seattle',
            ]);
    }

    public function testNewReservation()
    {
        $json = '{
  "quote_id": "18567",
  "first_name": "Test",
  "last_name": "McTesterson",
  "address": {
    "street_address": "1234 S Testing St.",
    "city": "Des Moines",
    "province": "WA",
    "postal_code": "98198",
    "country": "US"
  },
  "home_phone": "206-555-1212",
  "mobile_phone": "206-555-1111",
  "email": "dev@redawning.com",
  "payments": [
    {
      "method": "creditcard",
      "method_details": {
        "creditcard_number": "4111111111111111",
        "cvv": "123",
        "expiration_month": 8,
        "expiration_year": 2020
      },
      "amount": 1977.95,
      "currency": "USD"
    }
  ]
}';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.condo-world-engine.com/api/1.0.0/redAwning/reservations');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($response);

        $actual = 'We\'re sorry but this quote has expired. ';

        if (strpos($res->Message, $actual) > 1) {
            preg_match('/( BadRequestError: )(.*)(Please)/', $res->Message, $output_array);

            $this->assertEquals($actual, $output_array[2]);

        }
    }

}