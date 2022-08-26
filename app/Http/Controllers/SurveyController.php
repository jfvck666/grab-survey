<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Models\BackendLocation;
use App\Models\FrontendLocation;
use App\Models\SurveyAnswer;

class SurveyController extends Controller
{
    public function index()
    {   
        if ($position = Location::get(request()->ip())) {
            $backendLocation = BackendLocation::create(Location::get()->toArray());
        }

        return view('welcome');
    }

    public function store(Request $request)
    {
        if ($position = Location::get()) {
            $backendLocation = BackendLocation::create(Location::get()->toArray());

            $frontendLocation = new FrontendLocation;
            $frontendLocation->latitude = $request->latitude ?? null;
            $frontendLocation->longitude = $request->longitude ?? null;
            $frontendLocation->save();

            $surveyAnswer = new SurveyAnswer;
            $surveyAnswer->first_name = $request->first_name;
            $surveyAnswer->last_name = $request->first_name;
            $surveyAnswer->address = $request->address ?? null;
            $surveyAnswer->device = $request->device ?? null;
            $surveyAnswer->backend_location_id = $backendLocation->id;
            $surveyAnswer->frontend_location_id = $frontendLocation->id;
            $surveyAnswer->save();

        } else {

            $frontendLocation = new FrontendLocation;
            $frontendLocation->latitude = $request->latitude ?? null;
            $frontendLocation->longitude = $request->longitude ?? null;
            $frontendLocation->save();

            $surveyAnswer = new SurveyAnswer;
            $surveyAnswer->first_name = $request->first_name;
            $surveyAnswer->last_name = $request->first_name;
            $surveyAnswer->address = $request->address ?? null;
            $surveyAnswer->device = $request->device ?? null;
            $surveyAnswer->backend_location_id = null;
            $surveyAnswer->frontend_location_id = $frontendLocation->id;
            $surveyAnswer->save();
        }

        return redirect()->back();
    }

    public function getRawData(Request $request)
    {
        dd(SurveyAnswer::all(), FrontendLocation::all(), BackendLocation::all());
    }
}
