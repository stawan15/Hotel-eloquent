<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json([
            'status' => 'success',
            'data' => $bookings
        ]);
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'booking_date' => 'required|date',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
            'booking_date' => 'required|date',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
