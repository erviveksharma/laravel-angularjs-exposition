<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StandTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    /**
     * A root url for api to fetch stands by get exists, can be reached by api get.
     *
     * @return void
     */
    public function testURL()
    {
        $response = $this->call('GET','api/stand/1');

        $this->assertEquals(200,$response->status());
    }

    /**
     * A root url for api to fetch stands details by id with missing id.
     * should not be reached without stand id
     *
     * @return void
     */
    public function testMissingEventId()
    {
        $response = $this->call('GET','api/stand');

        $this->assertEquals(404,$response->status());
    }

    /**
     * Create booking without fields
     *
     *
     * @return void
     */
    public function testBookingWithoutFields()
    {
        $response = $this->call('POST','api/booking');

        $this->assertEquals(422,$response->status());
    }

}
