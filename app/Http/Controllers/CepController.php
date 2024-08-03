<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function show(string $cep)
    {
        $cep = preg_replace('/[^0-9]/', '', $cep);
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = Http::get($url);
        return response($response);
    }
}
