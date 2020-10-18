<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index (){
        
        return view('/prueba');
    }

    public function twitter()
    {
        require_once('codebird.php');
        \Codebird\Codebird::setConsumerKey('YOURKEY', 'YOURSECRET');

        $apiKey = "eIrvmXQm6MqK9R0OfoHCFmPsQ";
        $apiSecret = "KJN7JQr8GpEOpCwRTAazgRKOUhmOPy117efl35qAm1JVeMZLT5";
        $accessToken = "1578795474-pgaFKhStzMoe1AX1Od2NdNvn3FMOL2rLJeIJJFb";
        $accessTokenSecret = "x084QqKCsnTkGsVaZrL1xgfJtoeMOIMXTixVoQhAYL2rh";

        \Codebird\Codebird::setConsumerKey($apiKey, $apiSecret);
        $codebird = \Codebird\Codebird::getInstance();
        $codebird->setToken($accessToken, $accessTokenSecret);

        $params = array(
            "status" => "Este tweet ha sido publicado con PHP"
        );

        $codebird->statuses_update($params);
    }
}
