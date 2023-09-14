<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    function index(Request $request){
        $ciudades = City::where('department_id',$request->input('departamento'))->get();
        return response()->json($ciudades);
    }
}
