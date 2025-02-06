<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json([
            'status' => 'success',
            'data' => $teachers
        ]);
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'required',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
