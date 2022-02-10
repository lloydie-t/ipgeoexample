<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IPGeoRequest;
use App\Helpers\NetworkHelper;

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
        $validatedIP = $request->validated();

        $networkHelper = new NetworkHelper;

        $ipGeo = $networkHelper::ip2cGeo($validatedIP['ip_address']);
        $result = explode(";", $ipGeo);
        if($result[0] > 0){
            return collect([
                'data' => $ipGeo,
            ]);
        }
        else{
            $errors = array();
            $errors['ip_address'] = $result[3];
            return response()->json(array('success' => false, 'message' => 'Ohhh,Something went wrong!', 'errors' => $errors), 404);
        }
    }
}
