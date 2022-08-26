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

    public function fe(){
        return $this->hasMany('App\Models\FrontendLocation', 'frontend_location_id','id');
    }


    public function be(){
        return $this->hasMany('App\Models\BackendLocation', 'backend_location_id','id');
    }
}