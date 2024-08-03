<?php

namespace App\Actions\Platform;

use DB;

class GetPlatformConfig
{
    public static function get(string $key)
    {
        $config = DB::table('platform_configs')->where('key', $key)->first();

        if (!$config) {
            return null;
        }

        switch ($config->type) {
            case 'float':
                return (float) $config->value;
                break;
            case 'int':
                return (int) $config->value;
                break;
            case 'bool':
                return (bool) $config->value;
                break;
            case 'json':
                return json_decode($config->value);
                break;
            default:
                return $config->value;
                break;
        }
    }
}
