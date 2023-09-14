<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    function index(Request $request){
        $deptos = Department::all();
        return response()->json($deptos);
    }
}
