<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\FORCE_IP_RESOLVE;
use GuzzleHttp\DECODE_CONTENT;
use GuzzleHttp\CONNECT_TIMEOUT;
use GuzzleHttp\READ_TIMEOUT;
use GuzzleHttp\TIMEOUT;

class CitiesController extends Controller
{
    //
    public function index(){
        $response = Http::get('https://gist.githubusercontent.com/Ademking/282892333256e3474390d1ca643ef19d/raw/f982cd3f9b5bab2a1bb3b0ba23cfd5bba3705ccb/palestine_places.json/', [


        ]);
        dd($response);
    }
}
