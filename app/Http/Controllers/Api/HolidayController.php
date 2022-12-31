<?php

namespace App\Http\Controllers\Api;

use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    public function create (Request $request)
    {
        $holidays = Holiday::create([
            'title' => $request->title,
            'description' => $request->description,
            'holiday_date' => $request->holiday_date,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $holidays
        ], 200);
    }

    public function edit (Request $request, $id)
    {
        $holidays = Holiday::find($id);
        $holidays->update([
            'title' => $request->title,
            'description' => $request->description,
            'holiday_date' => $request->holiday_date,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $holidays
        ], 200);

    }

    public function delete ($id)
    {
        $holidays = Holiday::find($id);
        $holidays->delete();

        return response()->json([
            'status' => 'success',
            'data' => $holidays
        ], 200);
    }
}




