<?php
/*
 * Releans
 *
 * This file was automatically generated for Releans by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ReleansLib\Controllers;

use ReleansLib\APIException;
use ReleansLib\APIHelper;
use ReleansLib\Configuration;
use ReleansLib\Models;
use ReleansLib\Exceptions;
use ReleansLib\Http\HttpRequest;
use ReleansLib\Http\HttpResponse;
use ReleansLib\Http\HttpMethod;
use ReleansLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class BalanceController extends BaseController
{
    /**
     * @var BalanceController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return BalanceController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Get your available balance
     *
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getBalance()
    {

        //prepare query string for API call
        $_queryBuilder = '/balance';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //return null on 404
        if ($response->code == 404) {
            return null;
        }
        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }
}
