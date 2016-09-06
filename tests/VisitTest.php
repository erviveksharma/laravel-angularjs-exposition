<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitTest extends TestCase
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
     * Only method not accessible by non logged in user
     *
     * @return void
     */
    public function testVisitWithoutLogin()
    {
        $response = $this->call('POST','api/visit');

        $this->assertEquals(401,$response->status());
    }

}
