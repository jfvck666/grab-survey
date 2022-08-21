<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'device',
        'backend_location_id',
        'frontend_location_id',
    ];
}