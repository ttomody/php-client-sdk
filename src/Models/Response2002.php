<?php
/*
 * ReleansAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ReleansAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Response2002 implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var integer $balance public property
     */
    public $balance;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $balance Initialization value for $this->balance
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->balance = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['balance'] = $this->balance;

        return $json;
    }
}