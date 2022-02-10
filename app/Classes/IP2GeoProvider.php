<?php

namespace App\Classes;

use App\Classes\IPGeoClass;

/**
 * IP2GeoProider Class used for the IP2Gep provider
 *
 *
 * @package    IPGeoClass
 * @author     Lloyd Thomas <lloydie.t@gmail.com>
 */
class IP2GeoProvider extends IPGeoClass
{

    /**
    *
    * Constructor
    *
    * @param string $ip_address IP address that is used
    * @param string $country_code  country code returned by provider i.e. GB
    * @param string $long_counntry_code  Long country code returned by provider i.e. GBR
    * @param string $country  textual country returned by provider i.e. Great Britain
    * @return mixed
    */
    public function __construct(String $ip_address, String $country_code, String $long_counntry_code, String $country)
    {
        parent::__construct($ip_address, $country_code, $long_counntry_code, $country, null);
    }

}
