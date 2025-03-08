<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'country_code' , 'currency_name', 'currency_code', 'currency_symbol'];
    
    public $timestamps = false; // If you don't need created_at and updated_at columns
    
    protected $table = 'cities'; // Explicitly specify the table name
}