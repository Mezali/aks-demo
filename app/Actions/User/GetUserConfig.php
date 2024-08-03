<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\DB;

class GetUserConfig
{
    public static function get(string $key, $user)
    {
        $config = DB::table('user_configs')->where('user_id', $user->id)->where('key', $key)->first();

        if (!$config) {
            $config = DB::table('platform_configs')->where('key', $key)->first();
        } 

        switch ($config->type) {           
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
