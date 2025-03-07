<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExchangeService;
use App\Services\WeatherService;
use App\Models\City;

class TravelController extends Controller
{
    protected $exchangeService;
    protected $weatherService;

    public function __construct(ExchangeService $exchangeService, WeatherService $weatherService)
    {
        $this->exchangeService = $exchangeService;
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $cities = City::all();

        return view('travel', compact('cities'));
    }

    public function getTravelInfo(Request $request)
    {
        $city = City::find($request->city_id);
        $weather = $this->weatherService->getWeather($city->name);
        $exchange = $this->exchangeService->getExchangeRate($city->currency_code, $request->budget);

        return response()->json([
            'city_name' => $city->name,
            'weather' => $weather['main']['temp'],
            'currency_name' => $city->currency_name,
            'currency_code' => $city->currency_code,
            'currency_symbol' => $city->currency_symbol,
            'converted' => $exchange['converted'],
            'exchange' => $exchange['rate']
        ]);
    }
}