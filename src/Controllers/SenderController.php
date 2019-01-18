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
class SenderController extends BaseController
{
    /**
     * @var SenderController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return SenderController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Return the details of the sender name.
     *
     * @param string $id The sender id you want its details
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getSenderNameDetails(
        $id
    ) {
        //check that all required arguments are provided
        if (!isset($id)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/sender/view/';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'id' => $id,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
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

    /**
     * Create a new sender id to send messages using it
     *
     * @param string $senderName Name you want to register as Sender Name
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createSenderName(
        $senderName
    ) {
        //check that all required arguments are provided
        if (!isset($senderName)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/sender/create';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'text/plain; charset=utf-8',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //json encode body
        $_bodyJson = $senderName;

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

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

    /**
     * List all senders names associated with the account
     *
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAllSenders()
    {

        //prepare query string for API call
        $_queryBuilder = '/sender';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
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
