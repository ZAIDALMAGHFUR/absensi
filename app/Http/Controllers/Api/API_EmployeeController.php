<?php

namespace App\Http\Controllers\Api;

use App\Models\Attendance;
use App\Http\Controllers\Controller;

class API_EmployeeController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }

    public function create()
    {
        $attendances = Attendance::all();
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }

    public function edit()
    {
        $attendances = Attendance::all();
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }
}