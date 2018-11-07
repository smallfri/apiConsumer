<?php
namespace Tests;

use TestCase;

class RedAwningControllerTest extends TestCase
{
    public function testListingPrice()
    {
        $this->json('GET', 'http://homestead.test/api/v1/redAwning/listings/200518/price', [], ['Accept'=>'application/json'])
            ->seeJson([
                'base_minstay' => 1,
            ]);
    }
}