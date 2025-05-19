<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'age'     => 'required|integer|min:1',
            'subject' => 'required|string|max:100',
        ]);

        $teacher = Teacher::create($request->only('name', 'age', 'subject'));

        return response()->json([
            'message' => 'Teacher created successfully',
            'teacher' => $teacher,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $request->validate([
            'name'    => 'required|string|max:255',
            'age'     => 'required|integer|min:1',
            'subject' => 'required|string|max:100',
        ]);

        $teacher->update($request->only('name', 'age', 'subject'));

        return response()->json([
            'message' => 'Teacher updated successfully',
            'teacher' => $teacher,
        ]);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
