<?php


namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Classes\IP2GeoProvider;

/**
 * NetworkHelper Class various network helpers
 *
 *
 * @package    NetworkHelper
 * @author     Lloyd Thomas <lloydie.t@gmail.com>
 */
class NetworkHelper
{
    /**
     * return IP address Geo from ip2c
     *
     * @param string $ip_address IP address to be processed
     * @return mixed
     *
     * @author Lloyd Thomas <lloydie.t@gmail.com>
     */
    public static function ip2cGeo($ip_address)
    {
        $response = Http::get('https://ip2c.org', [
            'ip' => $ip_address,
        ]);

        if(!$response) throw new Exception('Problem accessing the IP2C Geo service');

        $data = explode(";",$response->body());
        if( is_numeric($data[0]) && $data[0] > 0){

            $iP2GeoProvider = new IP2GeoProvider($ip_address,$data[1],$data[2],$data[3]);
            $result = $iP2GeoProvider->getGeoResult();
            return collect([
                'data' => $result,
            ]);
        }
        else{
            return false;
        }
    }
}
