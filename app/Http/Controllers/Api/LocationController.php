<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function regency(Request $request)
    {
        $regencies = Regency::where('province_id', $request->get('id'))
            ->orderBy('name', 'ASC')->pluck('name', 'id');

        return response()->json($regencies);
    }
}
