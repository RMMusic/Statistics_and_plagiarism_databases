<?php

namespace App\Http\Controllers;

use App\Client;
use App\Models\CacheController;
use App\Options;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $options = Options::all();
        foreach ($options as $option)
        {
            Cache::forget($option->key);

            Cache::put($option->key, $option->value, 100);
            dd(Cache::get('title'));
//            Cache::put($option->key, !empty($option->getOptionsValue->first()->value) ?
//            $option->getOptionsValue->first()->value : $option->defaultValue, 100);
        }
    }
}