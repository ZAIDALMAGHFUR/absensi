<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }

    public function create(Request $request)
    {
        $attendances = Attendance::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'batas_start_time' => $request->batas_start_time,
            'batas_end_time' => $request->batas_end_time,
            'code' => $request->code,
            
        ]);
        // return response()->json($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        // return response()->json($request);

        $attendances = Attendance::find($id);
        $attendances->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'batas_start_time' => $request->batas_start_time,
            'batas_end_time' => $request->batas_end_time,
            'code' => $request->code,
        ]);
        return response()->json([
            'status' => 'success',
            'data' => $attendances
        ], 200);
    }
}
