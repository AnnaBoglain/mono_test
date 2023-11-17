<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverVueController extends Controller
{
    public function index(Request $request)
    {
        $drivers = Driver::all();
        return $drivers;
    }
}
