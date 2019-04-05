<?php
/*
 * ReleansAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ReleansAPILib\Tests;

use ReleansAPILib\APIException;
use ReleansAPILib\Exceptions;
use ReleansAPILib\APIHelper;
use ReleansAPILib\Models;

class BalanceControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \ReleansAPILib\Controllers\BalanceController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new \ReleansAPILib\ReleansAPIClient();
        self::$controller = $client->getBalance();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Get your available balance
     */
    public function testBalance()
    {
        // Parameters for the API call
        $accept = 'text/plain';

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getBalance($accept);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = null ;
        
        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertEquals(
            '{"balance":100}',
            $this->httpResponse->getResponse()->getRawBody(),
            "Response body does not match exactly"
        );
    }
}
