<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
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
     * A root url for api to fetch events by get exists, can be reached by api get.
     *
     * @return void
     */
    public function testURL()
    {
        $response = $this->call('GET','/');

        $this->assertEquals(200,$response->status());
    }

    /**
     * A root url for api to fetch all events details by id with missing id.
     *
     * @return void
     */
    public function testMissingEventId()
    {
        $response = $this->call('GET','api/events/');

        $this->assertEquals(200,$response->status());
    }


    /**
     * A root url for api to fetch events details by id with valid id.
     *
     * @return void
     */
    public function testValidEventId()
    {
        $response = $this->call('GET','api/events',array("id"=>1));

        $this->assertEquals(200,$response->status());
    }
}
