<?php

namespace App\Http\Controllers;

use App\Models\EducationDivision;
use App\Models\EducationZone;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getZones($province_id)
    {
        $zones = EducationZone::where('province_id', $province_id)->get();
        return response()->json($zones);
    }

    public function getDivisions($zone_id)
    {
        $divisions = EducationDivision::where('zone_id', $zone_id)->get();
        return response()->json($divisions);
    }
}
