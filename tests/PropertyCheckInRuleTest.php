<?php

class PropertyCheckInRuleTest extends TestCase
{
    /**
     * Test/Verify - Property with Check-In rule - Try to create reservation with start day
     * that is NOT allowed - reservation creation should not be allowed
     *
     * @return void
     */
    public function testPropertyCheckInRuleStartDayNOTAllowed()
    {
        parent::setUp();

        $command =<<<END
Test/Verify - Property with Check-In rule - Try to create reservation with start day that is NOT allowed - reservation creation should not be allowed
END;
        $to_date = '2018-09-01'; // not allowed
        $from_date = '2018-09-30';
        $product_id = 291356;

        $url = 'http://homestead.test/api/v1/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 2,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This property requires a minimum 1-night stay.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318179</id><checkin>2018-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'that is NOT allowed - reservation creation should not be allowed',
        ];

        $this->writeToLog($args);

    }

    public function testPropertyCheckInRuleEndDayNotAllowed()
    {
        parent::setUp();

        $command =<<<END
Test/Verify - Property with Check-Out rule - Try to create reservation with end day
that is NOT allowed - reservation creation should not be allowed
END;
        $to_date = '2018-09-01';
        $from_date = '2019-09-30'; // not allowed
        $product_id = 291356;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 2,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This property requires a minimum 1-night stay.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'that is NOT allowed - reservation creation should not be allowed',
        ];

        $this->writeToLog($args);

    }

    public function testPropertySpecificCheckInRuleStartDayNotAllowed()
    {
        parent::setUp();

        $command = <<<END
Test/Verify - Property with specific Check-In/Check-Out rule - Try to create reservation with start day is NOT allowed 
END;
        $to_date = '2018-09-29';// not allowed
        $from_date = '2018-09-30';
        $product_id = 291356;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 2,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This property requires a minimum 1-night stay.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'that is NOT allowed - reservation creation should not be allowed',
        ];

        $this->writeToLog($args);

    }

    public function testSpecificPropertyCheckInRuleEndDayNotAllowed()
    {
        parent::setUp();

        $command = <<<END
Test/Verify - Property with specific Check-In/Check-Out rule - Try to create reservation with end day is NOT allowed 
END;
        $to_date = '2018-09-29';
        $from_date = '2019-09-30'; // not allowed
        $product_id = 291356;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 2,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This property requires a minimum 1-night stay.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'that is NOT allowed - reservation creation should not be allowed',
        ];

        $this->writeToLog($args);

    }

    public function testPropertyCheckinRuleStayTooShortNotAllowed()
    {
        parent::setUp();

        $command = <<<END
Test/Verify – Property with MinStay requirement – try to create reservation that does NOT adhere to the MinStay requirement for a property
END;
        $to_date = date('Y-m-d',time());
        $to_date = strtotime($to_date);
        $to_date = strtotime("+7 day", $to_date);
        $to_date = date('Y-m-d', $to_date);

        $from_date = date('Y-m-d',time());
        $from_date = strtotime($from_date);
        $from_date = strtotime("+1 day", $from_date);
        $from_date = date('Y-m-d', $from_date);

        $product_id = 291356;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 2,
        "amount": 2036.75,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>product002</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>Product Beau Soleil is not available.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>product002</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'that is NOT allowed - reservation creation should not be allowed',
        ];

        $this->writeToLog($args);

    }

    public function testPropertyCheckinRuleStayTooManyGuestNotAllowed()
    {
        parent::setUp();

        $command = <<<END
Test/Verify – Max person value – verify max person value is on channel and will not allow a reservation when guest count exceeds that
END;
        $to_date = '2018-09-29';
        $from_date = '2018-09-28'; // not allowed
        $product_id = 291356;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 8,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": 291356,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>product008</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This product can not hold more than 4 adults.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 1-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'will not allow a reservation when guest count exceeds that number.',
        ];

        $this->writeToLog($args);

    }

    public function testPropertyCheckinRuleMinStayNotAllowed()
    {
        parent::setUp();

        $command = <<<END
Test/Verify – Property with property_min_stay table entry – Example: Property has
table entry in property_min_stay table. This value will supersede any MinStay value
in the price table. Verify against a property that has differing MinStay value in the
price table vs property_min_stay table
END;
        $to_date = '2018-10-08';
        $from_date = '2018-10-08'; // not allowed
        $product_id = 291358;

        $url = env('MyTestURL', true).'/bookingPal/createBooking';

        $json = <<<END
{
    "reservation": 
    {
        "adult": 8,
        "amount": 421.12,
        "cardmonth": 3,
        "cardnumber": 4111111111111111,
        "cardtype": 1,
        "cardyear": 2020,
        "cc_address": 123,
        "cc_bdd": 12,
        "cc_bdm": 12,
        "cc_bdy": 12,
        "cc_city": 123,
        "cc_country": "AZ",
        "cc_security_code": 123,
        "cc_state": null,
        "cc_zip": 123,
        "child": 0,
        "currency": "USD",
        "emailaddress": "qwe@qwe.com",
        "familyname": "qwe",
        "firstname": "qwe",
        "fromdate": "$from_date",
        "notes": "test",
        "pos": "6617607049f98025ce4fdc050602ac63",
        "productid": $product_id,
        "telnumber": 123123123,
        "todate": "$to_date"
    }
}
END;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //Find the product message code
        $re = '/<messageCode>(.*)<\/messageCode>/m';

        preg_match_all($re, $response, $matches, PREG_SET_ORDER, 0);
        preg_match_all('/<message>(.*)<\/message>/m', $response, $matches2, PREG_SET_ORDER, 0);

        //Make sure product message code matches the one in the response
        $this->assertEquals('<messageCode>reservation010</messageCode>', $matches[0][0]);
        $this->assertEquals('<message>This property requires a minimum 4-night stay.</message>', $matches2[0][0]);

        $test_data = <<<END
<?xml version="1.0"?>
<data><reservation_response><messageCode>reservation010</messageCode><propertyName/><propertyAddress/><propertyManagerName/><propertyManagerPhone/><propertyManagerEmail/><downPayment/><message>This property requires a minimum 4-night stay.</message><is_error>1</is_error><reservation><id>16318235</id><checkin>2019-09-30</checkin><checkout>2018-09-01</checkout><currency>USD</currency><price>421.12</price></reservation></reservation_response></data>
END;

        $args = [
            'command' => $command,
            'url' => $url,
            'product_id' => $product_id,
            'expected' => $test_data,
            'actual' => $response,
            'data' => 'will not allow a reservation when guest count exceeds that number.',
        ];

        $this->writeToLog($args);

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
