<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
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
     * A login url exists but only can be reached by api post.
     *
     * @return void
     */
    public function testURL()
    {
        $response = $this->call('GET','api/auth/login');

        $this->assertEquals(405,$response->status());
    }

    /**
     * A login request without params is handled.
     *
     * @return void
     */
    public function testBlankFields()
    {
        $response = $this->call('POST','api/auth/login');

        $this->assertEquals(422,$response->status());
    }

    /**
     * A login request with incorrect params is handled.
     *
     * @return void
     */
    public function testWrongFieldsData()
    {
        $response = $this->call('POST','api/auth/login',array("email"=>"test@mail.com","password"=>"test"));

        $this->assertEquals(401,$response->status());
    }

    /**
     * A login request with sql injection in params is handled.
     *
     * @return void
     */
    public function testSqlInjection()
    {
        $response = $this->call('POST','api/auth/login',array("email"=>"'/","password"=>"1=1"));

        $this->assertEquals(401,$response->status());
    }


}
