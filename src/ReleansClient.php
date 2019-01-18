<?php
/*
 * Releans
 *
 * This file was automatically generated for Releans by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ReleansLib;

use ReleansLib\Controllers;

/**
 * Releans client class
 */
class ReleansClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(
        $oAuthAccessToken = null
    ) {
        Configuration::$oAuthAccessToken = $oAuthAccessToken ? $oAuthAccessToken : Configuration::$oAuthAccessToken;
    }
    /**
     * Singleton access to Message controller
     * @return Controllers\MessageController The *Singleton* instance
     */
    public function getMessage()
    {
        return Controllers\MessageController::getInstance();
    }
    /**
     * Singleton access to Sender controller
     * @return Controllers\SenderController The *Singleton* instance
     */
    public function getSender()
    {
        return Controllers\SenderController::getInstance();
    }
    /**
     * Singleton access to Balance controller
     * @return Controllers\BalanceController The *Singleton* instance
     */
    public function getBalance()
    {
        return Controllers\BalanceController::getInstance();
    }
}
