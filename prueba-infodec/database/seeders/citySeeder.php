<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Faltaba importar el Facade DB

class CitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insertar ciudades (sintaxis correcta para múltiples registros)
        DB::table('cities')->insert([
            [
                'name' => 'New York',
                'country_code' => 'US', // Usar código ISO de 2 letras
                'currency_name' => 'Dollar',
                'currency_code' => 'USD',
                'currency_symbol' => '$',
            ],
            [
                'name' => 'London',
                'country_code' => 'GB',
                'currency_name' => 'Pound Sterling',
                'currency_code' => 'GBP',
                'currency_symbol' => '£',
            ],
            [
                'name' => 'Paris',
                'country_code' => 'FR',
                'currency_name' => 'Euro',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
            ],
            [
                'name' => 'Tokyo',
                'country_code' => 'JP',
                'currency_name' => 'Yen',
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

        // Si necesitas datos de prueba adicionales (opcional)
        // \App\Models\City::factory(10)->create();
    }
}