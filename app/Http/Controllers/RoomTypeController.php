<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return response()->json([
            'status' => 'success',
            'data' => $roomTypes
        ]);
    }

    public function create()
    {
        return view('room-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:room_types,name',
            'description' => 'required',
        ]);

        RoomType::create($request->all());

        return redirect()->route('room-types.index');
    }

    public function show(RoomType $roomType)
    {
        return view('room-types.show', compact('roomType'));
    }

    public function edit(RoomType $roomType)
    {
        return view('room-types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required|unique:room_types,name,' . $roomType->id,
            'description' => 'required',
        ]);

        $roomType->update($request->all());

        return redirect()->route('room-types.index');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->route('room-types.index');
    }
}
