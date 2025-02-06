<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelCustomer;

class HotelCustomerController extends Controller
{
    public function index()
    {
        $customers = HotelCustomer::all();
        return response()->json([
            'status' => 'success',
            'data' => $customers
        ]);
    }

    public function create()
    {
        return view('hotel_customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:hotel_customers,email',
            'phone' => 'required',
        ]);

        HotelCustomer::create($request->all());

        return redirect()->route('hotel_customers.index');
    }

    public function show(HotelCustomer $hotelCustomer)
    {
        return view('hotel_customers.show', compact('hotelCustomer'));
    }

    public function edit(HotelCustomer $hotelCustomer)
    {
        return view('hotel_customers.edit', compact('hotelCustomer'));
    }

    public function update(Request $request, HotelCustomer $hotelCustomer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:hotel_customers,email,' . $hotelCustomer->id,
            'phone' => 'required',
        ]);

        $hotelCustomer->update($request->all());

        return redirect()->route('hotel_customers.index');
    }

    public function destroy(HotelCustomer $hotelCustomer)
    {
        $hotelCustomer->delete();
        return redirect()->route('hotel_customers.index');
    }
}
