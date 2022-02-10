<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IPGeoRequest;
use App\Helpers\NetworkHelper;
use App\Models\Geoip;
use Exception;

class NetworkController extends Controller
{
    /**
     * Return Geo data from public IP address
     *
     * @param \App\Http\Requests\IPGeoRequest $request
     * @return Collection
     *
     * author Lloyd Thomas <lloydie.t@gmail.com>
     */
    public function getIPGeo(IPGeoRequest $request)
    {
        //check we have a valid IP address
        $validatedIP = $request->validated();

        $networkHelper = new NetworkHelper;

        try {
            $ipGeo = $networkHelper::ip2cGeo($validatedIP['ip_address']);
            if($ipGeo){
                //insert into DB - maybe use db if polling date is short
                $data = $ipGeo['data'];
                $geoip = Geoip::updateOrCreate(
                    ['iso_code' => $data['iso_code'] ,
                    'country_code' => $data['country_code'],
                    'country_name' => $data['country'],
                    'town' => $data['town']],
                    ['ip_address' => $validatedIP['ip_address']]
                );

                return collect([
                    'data' => $data,
                ]);
            }
            else{
                $errors = array();
                $errors['ip_address'] = ['IP2Geo returned an error'];
                return response()->json(array('success' => false, 'message' => 'Ohhh,Something went wrong!', 'errors' => $errors), 404);
            }
        } catch (Exception $e) {
            $errors = array();
            $errors['ip_address'] = [$e->getMessage()];
            return response()->json(array('success' => false, 'message' => 'Ohhh,Something went wrong!', 'errors' => $errors), 404);
        }

    }
}
