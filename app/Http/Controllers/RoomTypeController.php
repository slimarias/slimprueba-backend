<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roomTypes = RoomType::all();
        return response()->json($roomTypes);
    }

    public function show(Request $request, RoomType $roomType)
    {
        return response()->json($roomType->acomodations);
    }
}
