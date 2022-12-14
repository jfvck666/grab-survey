<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackendLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'countryName',
        'countryCode',
        'regionCode',
        'regionName',
        'cityName',
        'zipCode',
        'isoCode',
        'postalCode',
        'latitude',
        'longitude',
        'metroCode',
        'areaCode',
        'timezone',
        'driver',
    ];
}