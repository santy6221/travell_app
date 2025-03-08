<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        DB::table('cities')->insert([
            [
                'name' => 'Nueva York',
                'country_code' => 'US',
                'currency_name' => 'Dolar',
                'currency_code' => 'USD',
                'currency_symbol' => '$',
            ],
            [
                'name' => 'Londres',
                'country_code' => 'GB',
                'currency_name' => 'Libra esterlina',
                'currency_code' => 'GBP',
                'currency_symbol' => '£',
            ],
            [
                'name' => 'París',
                'country_code' => 'FR',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
            ],
            [
                'name' => 'Tokyo',
                'country_code' => 'JP',
                'currency_name' => 'Yen japonés',
                'currency_code' => 'JPY',
                'currency_symbol' => '¥',
            ],
            [
                'name' => 'Madrid',
                'country_code' => 'ES',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
            ],
        ]);

    }
}