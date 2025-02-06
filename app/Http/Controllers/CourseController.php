<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return response()->json([
            'status' => 'success',
            'data' => $courses
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses,name',
            'description' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|unique:courses,name,' . $course->id,
            'description' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
