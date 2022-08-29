<?php

namespace Aoeng\Laravel\Amap;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Amap
{
    protected $baseUrl = 'https://restapi.amap.com/v3/';

    protected $key;
    protected $secret;


    public function __construct(Application $app)
    {
        $this->key = config('amap.key', '');
        $this->secret = config('amap.secret', '');
    }

    public function weather($city, $extensions = null)
    {
        $response = $this->request('weather/weatherInfo', array_filter(compact('city', 'extensions')));

        if ($response['status'] == 1) {
            $response['data'] = $response['lives'];
            unset($response['lives']);
        }

        return $response;
    }


    public function request($path, $param = [], $method = 'GET')
    {

        $url = $this->baseUrl . $path;

        $param['key'] = $this->key;

        if ($method == 'GET') {
            return Http::get($url, $param)->json();
        } else {
            return Http::post($url, $param)->json();
        }
    }


}
