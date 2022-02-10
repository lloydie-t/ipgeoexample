<?php

namespace App\Classes;

/**
 * IPGeoClass Class used to formalise IP Geo output for various providers
 *
 *
 * @package    IPGeoClass
 * @author     Lloyd Thomas <lloydie.t@gmail.com>
 */
class IPGeoClass
{
    private $ip_address;
    private $iso_code;
    private $country_code;
    private $country;
    private $town;

    /**
    *
    * Constructor
    *
    * @param string $ip_address IP address that is used
    * @param string $iso_code  country code returned by provider i.e. GB
    * @param string $counntry_code  Long country code returned by provider i.e. GBR
    * @param string $country  textual country returned by provider i.e. Great Britain
    * @param string $town  textual town if provided by provider i.e. London
    * @return boolean
    */
    public function __construct($ip_address, $iso_code, $country_code, $country, $town=null)
    {
        $this->ip_address = $ip_address;
        $this->iso_code = $iso_code;
        $this->country_code = $country_code;
        $this->country = $country;
        $this->town = $town;
    }

    public function getGeoResult()
    {
        return ['ip_address' => $this->ip_address,
        'iso_code' => strtolower($this->iso_code),
        'country_code' => strtolower($this->country_code),
        'country' => $this->country,
        'town' => $this->town,
        'last_accessed' => date('Y-m-d H:i:s'),
        ];

    }
}
