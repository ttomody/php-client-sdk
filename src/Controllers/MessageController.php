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
class MessageController extends BaseController
{
    /**
     * @var MessageController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return MessageController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * List all messages sent by the account.
     *
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAllMessages()
    {

        //prepare query string for API call
        $_queryBuilder = '/message';

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
     * Return cost of sending a message to the number.
     *
     * @param string $mobileNumber Mobile number you want to know the price of sending a message.
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getPriceOfMessage(
        $mobileNumber
    ) {
        //check that all required arguments are provided
        if (!isset($mobileNumber)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/message/price';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'mobileNumber' => $mobileNumber,
        ));

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

    /**
     * Return the details of the message.
     *
     * @param string $id Id of the message you need to return its details.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getViewMessage(
        $id
    ) {
        //check that all required arguments are provided
        if (!isset($id)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/message/view';

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
     * Send a single message.
     *
     * @param string $senderId     Sender id to send the message from.
     * @param string $mobileNumber The mobile number supposed to receive the message.
     * @param string $message      Message text.
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createSendSMSMessage(
        $senderId,
        $mobileNumber,
        $message
    ) {
        //check that all required arguments are provided
        if (!isset($senderId, $mobileNumber, $message)) {
            throw new \InvalidArgumentException("One or more required arguments were NULL.");
        }


        //prepare query string for API call
        $_queryBuilder = '/message/send';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //prepare parameters
        $_parameters = array (
            'senderId'     => $senderId,
            'mobileNumber' => $mobileNumber,
            'message'      => $message
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Form($_parameters));

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
