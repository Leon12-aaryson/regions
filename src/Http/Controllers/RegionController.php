<?php

namespace Vendor\Regions\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class RegionController extends Controller
{
    public function countries()
    {
        return Response::json(DB::table('countries')->get());
    }

    public function states(Request $request)
    {
        $query = DB::table('states');
        if ($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }
        return Response::json($query->get());
    }

    public function cities(Request $request)
    {
        $query = DB::table('cities');
        if ($request->has('state_id')) {
            $query->where('state_id', $request->state_id);
        }
        return Response::json($query->get());
    }

    public function districts(Request $request)
    {
        $query = DB::table('districts');
        if ($request->has('city_id')) {
            $query->where('city_id', $request->city_id);
        }
        return Response::json($query->get());
    }
}