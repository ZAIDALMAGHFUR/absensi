<?php

namespace App\Http\Controllers\Api;
// use App\Models\employees;
use App\Models\User;
use App\Http\Controllers\Controller;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;


class API_EmployeeController extends Controller
{

    public function create(Request $request)
    {
        
        $employees = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'role_id' => $request->role_id,
        ]);
        // return response()->json($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $employees
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        $employees = User::find($id);
        $employees->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ], 200);
    }

    public function delete($id)
    {
        $employees = User::find($id);
        $employees->delete();

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ], 200);
    }
}