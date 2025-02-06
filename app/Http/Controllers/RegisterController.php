<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class RegisterController extends Controller
{
    public function index()
    {
        $registers = Register::all();
        return response()->json([
            'status' => 'success',
            'data' => $registers
        ]);
    }

    public function create()
    {
        return view('registers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required',
        ]);

        Register::create($request->all());

        return redirect()->route('registers.index');
    }

    public function show(Register $register)
    {
        return view('registers.show', compact('register'));
    }

    public function edit(Register $register)
    {
        return view('registers.edit', compact('register'));
    }

    public function update(Request $request, Register $register)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required',
        ]);

        $register->update($request->all());

        return redirect()->route('registers.index');
    }

    public function destroy(Register $register)
    {
        $register->delete();
        return redirect()->route('registers.index');
    }
}
