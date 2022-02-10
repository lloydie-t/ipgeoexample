<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Http;

class NetworkHelper
{

    /**
     * return IP address Geo from ip2c
     *
     * @param string $ip_address
     * @return mixed
     *
     * @author Lloyd Thomas <lloydie.t@gmail.com>
     */
    public static function ip2cGeo($ip_address)
    {
        $response = Http::get('https://ip2c.org', [
            'ip' => $ip_address,
        ]);

        return $response->body();
    }
}
