<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance; 

class AttendanceController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $data = \Excel::toArray([], $file);
            return response()->json(['message' => 'Attendance data uploaded successfully'], 200);
        }

        return response()->json(['error' => 'File not found'], 404);
    }

    public function getAttendance($employeeName)
    {
        $attendance = Attendance::where('employee_name', $employeeName)->get();

        if ($attendance->isEmpty()) {
            return response()->json(['message' => 'Attendance data not found'], 404);
        }

        return response()->json($attendance, 200);
    }
}
