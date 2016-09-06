<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class signupTest extends TestCase
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
     * A signup url exists but only can be reached by api post.
     *
     * @return void
     */
    public function testURL()
    {
        $response = $this->call('GET','api/auth/signup');

        $this->assertEquals(405,$response->status());
    }

    /**
     * A signup request without params is handled.
     *
     * @return void
     */
    public function testBlankFields()
    {
        $response = $this->call('POST','api/auth/signup');

        $this->assertEquals(422,$response->status());
    }

    /**
     * A signup request with incorrect params is handled.
     * min pass length = 6
     * @return void
     */
    public function testWrongFieldsData()
    {
        $response = $this->call('POST','api/auth/signup',array("name"=>"vivek sharma","email"=>"test@mail.com","password"=>"test"));

        $this->assertEquals(422,$response->status());
    }

    /**
     * A login request with sql injection in params is handled.
     *
     * @return void
     */
    public function testSqlInjection()
    {
        $response = $this->call('POST','api/auth/login',array("name"=>"vivek sharma","email"=>"'/","password"=>"1=1"));

        $this->assertEquals(401,$response->status());
    }
}
