<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tracking\ActivityResource;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class TrackingController extends Controller
{
    public function getAllTrafics() {

        return ActivityResource::collection(Activity::all());
    }
}
