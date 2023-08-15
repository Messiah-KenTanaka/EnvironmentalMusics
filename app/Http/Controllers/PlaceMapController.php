<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceMap;

class PlaceMapController extends Controller
{
    public function index() {

        return PlaceMap::all();
    }
}
