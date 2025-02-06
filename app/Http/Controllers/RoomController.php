<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json([
            'status' => 'success',
            'data' => $rooms
        ]);
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|unique:rooms,room_number',
            'capacity' => 'required|integer',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'capacity' => 'required|integer',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
