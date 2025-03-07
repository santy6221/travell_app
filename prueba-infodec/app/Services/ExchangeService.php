<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeService {

    protected $apiKey;
    protected $apiUrl = 'https://v6.exchangerate-api.com/v6/';

    public function __construct() {
        $this->apiKey = config('services.exchangerate.key');
    }

    public function getExchangeRate($to, $amount) {
        
        $response = Http::get("{$this->apiUrl}{$this->apiKey}/pair/COP/{$to}/{$amount}");

        if($response->failed()) {
            throw new \Exception('Error al obtener la tasa de cambio' . $response->body());
        }

        if($response->json()['result'] !== 'success') {
            throw new \Exception('Error al obtener la tasa de cambio' . $response->json()['error-type']);
        }

        // $rate = $response->json()['conversion_rate'];
        // $converted = $response->json()['conversion_result'];

        return ['converted' => $response->json()['conversion_result'], 'rate' => $response->json()['conversion_rate']];
    }
}