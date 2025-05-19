<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Students::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'age'   => 'required|integer|min:1',
            'grade' => 'required|string|max:10',
        ]);

        $student = Students::create($request->only('name', 'age', 'grade'));

        return response()->json([
            'message' => 'Student created successfully',
            'student' => $student,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $request->validate([
            'name'  => 'required|max:255',
            'age'   => 'required|integer|min:1',
            'grade' => 'required|string|max:10',
        ]);

        $student->update($request->only('name', 'age', 'grade'));

        return response()->json([
            'message' => 'Student updated successfully',
            'student' => $student,
        ]);
    }

    public function destroy($id)
    {
        $student = Students::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
