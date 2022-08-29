<?php

namespace Aoeng\Laravel\Amap\Facades;

use Aoeng\Laravel\Tronscan\Tronscan;
use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static array weather($city,$extensions = null)
 * @method static array request($path, $param = [], $method = 'GET', $sign = false)
 */
class Amap extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-amap';
    }

}
