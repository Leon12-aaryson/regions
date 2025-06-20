<?php

use Illuminate\Support\Facades\Route;
use Vendor\Regions\Http\Controllers\RegionController;

Route::prefix('regions')->group(function () {
    Route::get('countries', [RegionController::class, 'countries']);
    Route::get('states', [RegionController::class, 'states']);
    Route::get('cities', [RegionController::class, 'cities']);
});