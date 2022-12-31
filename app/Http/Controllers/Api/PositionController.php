<?php

namespace App\Http\Controllers\Api;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{

    public function get ()
    {
        $positions = Position::all();

        return response()->json([
            'status' => 'success',
            'data' => $positions
        ], 200);
    }
    public function create (Request $request)
    {
        $positions = Position::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $positions
        ], 200);
    }

    public function edit (Request $request, $id)
    {
        $positions = Position::find($id);
        $positions->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $positions
        ], 200);

    }

    public function delete ($id)
    {
        $positions = Position::find($id);
        $positions->delete();

        return response()->json([
            'status' => 'success',
            'data' => $positions
        ], 200);
    }
}
